<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Interfaces\{NotificationRepositoryinterface};
use Illuminate\Http\Request;
use App\Models\{Order,UserNotification,UserNotificationTranslation,User,BankTransfare};
use Alert;
use Auth;
class OrderController extends Controller
{
    //

    public function __construct(NotificationRepositoryinterface $NotificationRepository)
    {
        $this->NotificationRepository = $NotificationRepository;
    }



    public function index($type){
        if(!Auth::guard('web')->user()->hasPermissionTo('show_orders'))
        return redirect()->back();

        return view('admin.order.index',compact('type'));
    }
    public function list(Request $request ,$type){
        $query=Order::query()->with('user','detailes');
        $order = $request['order'];


        // Handle searching/filtering
        if ($request->has('search')) {
            $search = $request->input('search.value');
            $query->where(function ($query) use ($search,$type) {
                $query

                ->where('orders.status',$type);
                    // ->where('orders.name', 'like', '%' . $search . '%')
                    // ->orWhere('orders.email', 'like', '%' . $search . '%');
                // Add more columns as needed
            });
        }

        // $orderColumn = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
        if (isset($order) && count($order)){
            $column = $order[0];
            $query = $query->orderBy($request->columns[+$column['column']]['data'], $column['dir']);
        }

        //$query->orderBy('created_at', $orderDirection);

        // Count total records (needed for pagination)
        $totalRecords = $query->count();

        $start = $request->input('start');
        $length = $request->input('length');
        $query->skip($start)->take($length);

       // $data = $query;

        $data = $query->where('status',$type)->get()
        ->map(function ($item) use($type){
             $user_name = __('dashboard.Previous_user');  $user_phone = null;
             if($item->user!=null){
                $user_name = $item->user->name;
                $user_phone = $item->user->phone;
             }


            return [
                'id'               =>$item->id,
                'customer_name'    =>$item->detailes[0]->name,
                'customer_phone'   =>$item->detailes[0]->phone,

                'user_name'       =>$user_name,
                'phone'           =>$user_phone,


                'payment_type'    =>$item->payment_type,
                'price'           =>$item->price_after_discount,
                'created_at'      =>$item->created_at->format('Y-m-d H:i:s'),   // Format the date
                'type'            =>$type
            ];
        });


        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // You can apply filtering logic to change this value
            'data' => $data,
        ]);
    }

    public function accept($id){
        if(!Auth::guard('web')->user()->hasPermissionTo('accept_order'))
        return redirect()->back();
        try{
            DB::beginTransaction();
             $order=Order::find($id);
             $order->update(['status'=>2]);



                // begain send notification

                    $usernotification=UserNotification::create([
                        'user_id' =>  $order->user_id
                    ]);

                    $langs=['ar','en'];
                    foreach($langs as $lang){
                    if($lang=='ar'){
                        $title='تم قبول طلبك ';
                        $body=' تم قبول طلبك جاري تجهيز طلبك الان';
                        }else{
                        $title='your order accepted';
                        $body=' your order being prepare now';
                        }
                        UserNotificationTranslation::create([
                            'user_notification_id' =>$usernotification->id,
                            'locale'    =>$lang,
                            'title'     =>$title,
                            'body'      =>$body,
                        ]);
                    }

                    $user=User::find($order->user_id);
                    if($user->lang=='ar'){
                        $title='تم قبول طلبك ';
                        $body=' تم قبول طلبك جاري تجهيز طلبك الان';
                    }else{
                        $title='your order accepted';
                        $body=' your order being prepare now';
                    }
                    $this->NotificationRepository->sendnotification('user',$user->id,$title,$body);

                // end send notification



            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.accept_order'));
            return redirect()->back();
               }catch(\Exception $ex){
                     return redirect()->back();
               }
    }

    public function reject($id){
        if(!Auth::guard('web')->user()->hasPermissionTo('reject_order'))
        return redirect()->back();
        try{
            DB::beginTransaction();
             $order=Order::find($id);
             $order->update(['status'=>5]);

             $user=User::find($order->user_id);

                // return money to wallet
                if($order->payment_type!=2){
                    $user->wallet=$user->wallet+$order->price_after_discount;
                    $user->save();
                }

                // begain send notification
                    $usernotification=UserNotification::create([
                        'user_id' =>  $order->user_id
                    ]);

                    $langs=['ar','en'];
                    foreach($langs as $lang){
                    if($lang=='ar'){
                        $title='تم رفض طلبك ';
                        $body=' تم رفض طلبك ';
                        }else{
                        $title='your order rejected';
                        $body=' your order rejected';
                        }
                        UserNotificationTranslation::create([
                            'user_notification_id' =>$usernotification->id,
                            'locale'    =>$lang,
                            'title'     =>$title,
                            'body'      =>$body,
                        ]);
                    }


                    if($user->lang=='ar'){
                        $title='تم رفض طلبك ';
                        $body=' تم رفض طلبك ';
                    }else{
                        $title='your order rejected';
                        $body=' your order rejected';
                    }


                    $this->NotificationRepository->sendnotification('user',$user->id,$title,$body);
                // end send notification
            DB::commit();
            Alert::success(__('dashboard.success'), __('dashboard.reject_order'));
            return redirect()->back();
           }catch(\Exception $ex){
                 return redirect()->back();
           }
    }

    public function delivery($id){
        try{
            DB::beginTransaction();
             $order=Order::find($id);
             $order->update(['status'=>3]);
                // begain send notification

                    $usernotification=UserNotification::create([
                    'user_id' =>  $order->user_id
                    ]);

                    $langs=['ar','en'];
                    foreach($langs as $lang){
                    if($lang=='ar'){
                        $title='الطلب متجه اليك';
                        $body=' الطلب متجه اليك';
                        }else{
                        $title='order in the way';
                        $body=' order in the way';
                        }
                        UserNotificationTranslation::create([
                            'user_notification_id' =>$usernotification->id,
                            'locale'    =>$lang,
                            'title'     =>$title,
                            'body'      =>$body,
                        ]);
                    }

                    $user=User::find($order->user_id);
                    if($user->lang=='ar'){
                        $title='الطلب متجه اليك';
                        $body=' الطلب متجه اليك';
                    }else{
                        $title='order in the way';
                        $body=' order in the way';
                    }
                    $this->NotificationRepository->sendnotification('user',$user->id,$title,$body);

                // end send notification
                Alert::success(__('dashboard.success'), __('dashboard.delivery_order'));
            DB::commit();
            return redirect()->back();
           }catch(\Exception $ex){
                 return redirect()->back();
           }
    }

    public function compelet($id){
        try{
            DB::beginTransaction();
             $order=Order::find($id);
             $order->update(['status'=>4]);

                        // begain send notification
                        $usernotification=UserNotification::create([
                            'user_id' =>  $order->user_id
                        ]);

                        $langs=['ar','en'];
                        foreach($langs as $lang){
                        if($lang=='ar'){
                            $title='الطلب اكتمل ';
                            $body=' الطلب اكتمل  ';
                            }else{
                            $title='order  completed';
                            $body=' order  compeleted';
                            }
                            UserNotificationTranslation::create([
                                'user_notification_id' =>$usernotification->id,
                                'locale'    =>$lang,
                                'title'     =>$title,
                                'body'      =>$body,
                            ]);
                        }

                        $user=User::find($order->user_id);
                        if($user->lang=='ar'){
                            $title='الطلب اكتمل ';
                            $body=' الطلب اكتمل  ';
                        }else{
                            $title='order  completed';
                            $body=' order  compeleted';
                        }
                        $this->NotificationRepository->sendnotification('user',$user->id,$title,$body);

                        // end send notification
                        Alert::success(__('dashboard.success'), __('dashboard.compelete_order'));

            DB::commit();
            return redirect()->back();
           }catch(\Exception $ex){
                 return redirect()->back();
           }
    }

    public function show($id){

         $order=Order::with('items.product','detailes')->find($id);
         $banktransfare='';

         if($order->payment_type==2){
            $banktransfare=BankTransfare::select('Img')->where(['order_id'=>$order->id, 'type' => 'order'])->first();
         }

         return view('admin.order.detailes',compact('order','banktransfare'));
    }

}
