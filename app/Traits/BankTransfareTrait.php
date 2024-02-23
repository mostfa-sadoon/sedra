<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use App\Models\BankTransfare;

trait BankTransfareTrait
{


    public function bankTransfare($bank_id,$img,$type,$order_id,$user,$amount){



            //dd($amount);
            $bank= BankTransfare::create([
                'bank_id'       =>$bank_id,
                'img'           =>$img,
                'user_id'       =>$user->id,
                'type'          =>$type,
                'order_id'      =>$order_id,
                'amount'        =>$amount
            ]);

            return true;

    }
}
