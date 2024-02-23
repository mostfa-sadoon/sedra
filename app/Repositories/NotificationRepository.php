<?php

namespace App\Repositories;

use App\Interfaces\NotificationRepositoryinterface;
use App\Models\{UserDeviceToken,CompanyDeviceToken};


class NotificationRepository implements NotificationRepositoryinterface
{
   public function create_device_token($type,$token,$id){
      if($type=='user'){
        $userdevicetoken=UserDeviceToken::where('fcm_token',$token)->first();

        if($userdevicetoken!=null)
        $userdevicetoken->delete();

        UserDeviceToken::create([
            'user_id'=>$id,
            'fcm_token'=>$token
        ]);
        return true;
      }
      if($type=='company'){


        $CompanyDeviceToken=CompanyDeviceToken::where('fcm_token',$token)->first();
        if($CompanyDeviceToken!=null)
        $CompanyDeviceToken->delete();

        CompanyDeviceToken::create([
            'company_id'=>$id,
            'fcm_token'=>$token
        ]);
        return true;

      }
   }



   public function delete_device_token($type,$token,$id){
    if($type=='user'){
        $userdevicetoken=UserDeviceToken::where(['fcm_token'=>$token,'user_id'=>$id])->first();
        if($userdevicetoken!=null){
            $userdevicetoken->delete();
        }
        return true;
      }
      if($type=='company'){
        $CompanyDeviceToken=CompanyDeviceToken::where(['fcm_token'=>$token,'company_id'=>$id])->first();
        if($CompanyDeviceToken!=null){
            $CompanyDeviceToken->delete();
        }
        return true;
      }
   }


   public function sendnotification($type,$id,$title,$body){

    $SERVER_API_KEY = env('FIRE_BASE_TOKEN');

    if($type=='user'){
        $userdevicetokens=UserDeviceToken::where('user_id',$id)->pluck('fcm_token')->all();

        $data = [
            "registration_ids" => $userdevicetokens,
            "notification"=>[
                "title" => $title,
                "body" => $body,

            ]
            ,
            "priority" => "high",
            "delay_while_idle" => false,
            // ,
            "data"=>[
                "title" => $title,
                "body" => $body,
            ],

        ];
    }
    if($type=='company'){
        // check if user open notification setting
        $userdevicetokens=CompanyDeviceToken::where('company_id',$id)->pluck('fcm_token')->all();

        $data = [
            "registration_ids" => $userdevicetokens,
            "notification"=>[
                "title" => $title,
                "body" => $body
            ],
            "priority" => "high",
            "delay_while_idle" => false,
            // ,
            "data"=>[
                "title" => $title,
                "body" => $body,
            ],

        ];
    }

    $dataString = json_encode($data);

    $headers = [
        'Authorization: key=' . $SERVER_API_KEY,
        'Content-Type: application/json',
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    $response = curl_exec($ch);
    return true;
}
}
