<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory,HasRoles;
    protected $table='admins';
    protected $guarded=[];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }



    public function getImgAttribute($value){
        if($value!=null){
            return asset('uploads/Admin/imgs/'.$value);

        }
        return asset('uploads/Admin/default/default.png');
    }

    

}
