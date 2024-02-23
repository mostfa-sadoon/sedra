<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OmraVisa extends Model
{
    use HasFactory;
    protected $table='omra_visas';
    protected $guarded=[];


    public function getPassportImgAttribute($value) {
        return asset('uploads/users/omra/'.$value);
    }
    public function getpersonalImgAttribute($value) {
        return asset('uploads/users/omra/personal/'.$value);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
