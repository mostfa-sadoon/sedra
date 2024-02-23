<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanceledCampaign extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='canceled_campaign';
}
