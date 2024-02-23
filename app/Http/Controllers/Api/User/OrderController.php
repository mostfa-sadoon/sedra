<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderDetail,OrderItem,Cart,CartItem,Bank,BankTransfare,Product,PromoCode};
use Illuminate\Support\Facades\DB;
use Auth;
use App\Traits\{response,fileTrait,BankTransfareTrait};


class OrderController extends Controller
{
    //
    use response,fileTrait,BankTransfareTrait;
    public function store(Request $request){
        // if mobile use promocode price will be less
        // first mobile developer use usePromocode() functoin to get price after discount and send it in (price)
        try{

            date_default_timezone_set('Asia/Kuwait');

            $user=Auth::guard('user_api')->user();
            DB::beginTransaction();
            // if user pay by wallet
            if($request->wallet_price!=0){
                // if user havn't enough money
                if($user->wallet<$request->wallet_price)
                return $this->response(false,'you have not enought mony',null,406);
                $user->update(['wallet'=>$user->wallet-$request->wallet_price]);


            }


             $price_after_discount=$request->price;
             // check if user use promo code
             if($request->price_after_discount>0 || $request->price_after_discount!=null){
                $price_after_discount=$request->price_after_discount;

                $PromoCode=PromoCode::where('code',$request->promocode)->first();

                if($PromoCode){
                    $PromoCode->users_number=$PromoCode->users_number-1;
                    $PromoCode->save();
                }

             }


            $order=Order::create([
                 'user_id'                  =>$user->id,
                 'price_before_discount'    =>$request->price,
                 'price_after_discount'     =>$price_after_discount,
                 'payment_type'             =>$request->payment_type,
                 'promocode'                =>$request->promocode,
                 'fort_id'                  =>$request->fort_id
              ]);

            $order_detailes=OrderDetail::create([
                'order_id'       =>$order->id,
                'phone'          =>$request->phone,
                'country_code'   =>$request->country_code,
                'note'           =>$request->note,
                'lat'            =>$request->lat,
                'lng'            =>$request->lng,
                'address'        =>$request->address,
                'name'           =>$request->name
            ]);

            $cart=Cart::where('user_id',$user->id)->first();
            $cartitems=CartItem::where('cart_id',$cart->id)->get();
            foreach($cartitems as $item){
                OrderItem::create([
                     'order_id'       =>$order->id,
                     'product_id'   => $item->product_id,
                     'quantity'     => $item->quantity,
                     'price'        =>$item->price
                ]);
                $item->delete();
                $Product=Product::find($item->product_id);
                if($Product->count==0)
                return $this->response(false,__('response.product_empty'),null,419);
                if($Product->count<$item->quantity)
                return $this->response(false,__('response.product_quantity'),null,419);
                $Product->update(['count'=>$Product->count-$item->quantity  , 'sold_quantity'=>$Product->sold_quantity+$item->quantity]);
            }
             $cart->total=0;
             $cart->save();

             $data['id']=$order->id;
             if($request->transfare_img!=null && $request->bank_id!=null){
                $img=$this->MoveImage($request->transfare_img,'uploads/users/banktransfare');
                $amount=$price_after_discount;

                if($request->wallet_price!=0){
                    $amount -=$request->wallet_price;
                }
                $this->bankTransfare($request->bank_id,$img,'order',$order->id,$user,$amount);
             }


             DB::commit();


             return $this->response(true,__('response.create_order'),$data);
        }catch(\Exception $ex){
          return $this->response(false,__('response.wrong'),null,419);
        }
    }

    public function get_banks(Request $request){
       $data['banks']=Bank::get();
       return $this->response(true,__('response.success'),$data);
    }

    public function bank_transfare(Request $request){

        try{
            DB::beginTransaction();
            $user=Auth::guard('user_api')->user();
            $img=$this->MoveImage($request->img,'uploads/users/banktransfare');
            BankTransfare::create([
               'bank_id'       =>$request->bank_id,
               'img'           =>$img,
               'user_id'       =>$user->id,
               'type'          =>$request->type,
               'order_id'      =>$request->id
            ]);
            DB::commit();
            return $this->response(true,__('response.success'));
        }catch(\Exception $ex){
            return $this->response(false,__('response.wrong'),null,419);

        }
    }

    public function get_orders(Request $request){

       try{

        $user=Auth::guard("user_api")->user();
        $orders=Order::with(['detailes','items.product'])
        ->orderBy('created_at','desc')
        ->where('user_id',$user->id)

        ->paginate(20);

        $orders->map(function ($item) {
               $cancelation=true;
               if($item->status==3|| $item->status==4 ||$item->status==5)
               $cancelation=false;
            return [
                'id'                        =>$item->id,
                'cancelation'               =>$cancelation,
                'confirmation'              =>$item->confirmation,
                'user_id'                   =>$item->user_id,
                'promocode_id'              =>$item->promocode_id,
                'price_after_discount'      =>$item->price_after_discount,
                'price_before_discount'     =>$item->price_before_discount,
                'payment_type'              =>$item->payment_type,
                'status'                    =>$item->status,
                'created_at'                =>$item->created_at,
                'updated_at'                =>$item->updated_at,
                'detailes'                  =>$item->detailes,
                'items'                     =>$item->items,
            ];
        });


        return $orders;

        return $this->response(true,__('response.success'));
        }catch(\Exception $ex){
            return $this->response(false,__('response.wrong'),null,419);
        }

    }

    public function cancelOrder(Request $request){
        try{
            DB::beginTransaction();
            $user=Auth::guard('user_api')->user();
            $order=Order::find($request->order_id);
            if($order->payment_type!=2){
                $user->wallet=$user->wallet+$order->price_after_discount;
                $user->save();
            }

            $orderitems=OrderItem::where('order_id',$request->order_id)->get();
            foreach($orderitems as $item){
                $Product=Product::find($item->product_id);
                $Product->update(['count'=>$Product->count+$item->quantity  , 'sold_quantity'=>$Product->sold_quantity-$item->quantity]);
            }

            $order->status=6;
            $order->save();
            DB::commit();
            return $this->response(true,__('response.cancel_order'));

        }catch(\Exception $ex){
            return $this->response(false,__('response.wrong'),null,419);
        }
    }

    public function usePromocode(Request $request){

        $promocode= PromoCode::where('code',$request->code)->first();

        if($promocode==null)
        return $this->response(false,__('response.not_found'),null,408);

        // check if promocode still avilable
        if($promocode->users_number <= 0)
          return $this->response(false,__('response.expire_promo_code'),null,408);

        // check if price fullified requirment
        if($promocode->min_order_price >= $request->price)
          return $this->response(false,__('response.skiped_allowed_value'),null,408);

        $promocode->users_number-=1;
        $promocode->save();

        if($promocode->amount==0){
            $price=$request->price - ($request->price*($promocode->percent/100));
             $data['data']['price_after_disccount']=$price;
            return $this->response(true,'price after discount',$data);
        }else{
            $price=$request->price - $promocode->amount;
            return $this->response(true,'price after discount',$price);
        }

    }

}
