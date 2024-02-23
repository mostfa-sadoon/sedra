<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class UserNotification extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;

    public array $translatedAttributes = ['title','body'];
    protected $guarded = [];
    protected $hidden = ['translations'];

    protected $table='usernotification';
}
