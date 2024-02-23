<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransfare extends Model
{
    use HasFactory;
    protected $table='bank_transfares';
    protected $guarded=[];

    public function user(){
       return  $this->belongsTo(User::class);
    }

    public function bank(){
        return  $this->belongsTo(Bank::class);
     }

     public function getImgAttribute($value) {
        if($value!=null)
        return asset('uploads/users/banktransfare/'.$value);
        return asset('uploads/users/default/default.png');
    }


}
