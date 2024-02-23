<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserRegiment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'user_regiments';
    protected $guarded = [];
    protected $hidden = [];


    public function user()
    {
        return $this->belongsTo(User::class ,'user_id' ,'id');
    }



    public function regiment()
    {
        return $this->belongsTo(Regiment::class , 'regiment_id' , 'id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class , 'campaign_id' , 'id');
    }

    // this scope to prevent to get user regmint which his campiagn has soft deleted
    public function scopeActive($query)
    {
        return $query->whereHas('campaign', function ($query) {
            $query->whereNull('deleted_at'); // Only include ChildModel records with non-deleted ParentModel records.
        });
    }


}
