<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{CompanyDeviceToken,CompanyNotification};
use App\Interfaces\NotificationRepositoryinterface;
use App\Traits\{response,fileTrait};
use Auth;
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
        $company=Auth::guard('company_api')->user();
        $this->NotificationRepository->create_device_token('company',$request->device_token,$company->id);
        return $this->response(true,'create token successfuly');
     }


    public function getNotifications(Request $request){
        $company=Auth::guard('company_api')->user();
        $notifications= CompanyNotification::where('company_id',$company->id)->get();
        $data['notifications']=$notifications;
        return $this->response(true,'get notification success',$data);
    }
}
