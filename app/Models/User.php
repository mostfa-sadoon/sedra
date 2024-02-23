<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getImgAttribute($value){
        if($value!=null){
            return asset('uploads/users/imgs/'.$value);
        }
        return asset('uploads/users/default/default.png');
    }

    public function getPassportImgAttribute($value) {
        if($value!=null)
        return asset('uploads/users/passport_img/'.$value);

        return asset('uploads/users/default/default.png');

    }




    public function orders(){
        return $this->hasMany(Order::class ,'user_id');
    }


    public function notifications(){
        return $this->hasMany(UserNotification::class ,'user_id');
    }


    public function omravisa(){
        return $this->hasMany(OmraVisa::class ,'user_id');
    }

    public function BarcodeTemplate(){
        return $this->hasMany(BarcodeTemplate::class ,'user_id');
    }


    public function UserRegiment(){
        return $this->hasMany(UserRegiment::class  ,'user_id');
    }



    /**
     * The attributes that are mass assignable.  passportimg
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }



    public function regiments(): BelongsToMany
    {
        return $this->belongsToMany(Regiment::class , 'user_regiments' , 'user_id' , 'regiment_id' , 'id' , 'id');
    }

    // protected function passportimg(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => asset('uploads/users'.$value)
    //     );

    // }


}
