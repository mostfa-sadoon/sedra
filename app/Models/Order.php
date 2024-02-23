<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    public $guarded=[];
    public function detailes()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(){


        return $this->belongsTo(User::class);

    }

    

}
