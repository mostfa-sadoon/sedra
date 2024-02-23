<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\NotificationRepositoryinterface;
use Auth;
use App\Traits\{response,fileTrait};
use App\Models\{UserNotification};

class NotificationController extends Controller
{
    //
    use response;
    private NotificationRepositoryinterface $NotificationRepository;
    public function __construct(NotificationRepositoryinterface $NotificationRepository)
    {
        $this->NotificationRepository = $NotificationRepository;
    }
    public function create_device_token(Request $request){
       $user=Auth::guard('user_api')->user();
      $this->NotificationRepository->create_device_token('user',$request->device_token,$user->id);
       return $this->response(true,__('response.success'));
    }


    public function getNotifications(Request $request){
        $user=Auth::guard('user_api')->user();
        $notifications= UserNotification::where('user_id',$user->id)->get();
        $data['notifications']=$notifications;
        return $this->response(true,__('response.success'),$data);
    }
}
