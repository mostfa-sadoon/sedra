<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDocs extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class , 'campaign_id' , 'id');
    }
    public function getDocumentAttribute($value) {
        return asset('uploads/booking_docs/'.$value);
    }
}
