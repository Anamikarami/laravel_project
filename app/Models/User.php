<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
//     public function user()
// {
//     return $this->belongsTo(User::class);
// }
// public function profile()

// {

//     return $this->hasOne(Profile::class);

// }

    public function setUserSessiondata($id){

        // $userSetting =UsersSetting::where('id',$id)->first();
        // $userSetting = $userSetting->toArray();


        $userSetting = User::find($id);
        return $userSetting ? $userSetting->toArray() : [];
        //dump($userSetting);
    
       $userDefaultDate = config('comondata.defualt');
       //dump($userDefaultDate);
    
       foreach($userSetting as $uservalue=>$value){
        //   if(empty($value)){
        //   $userSetting[$uservalue] = $userDefaultDate[$uservalue];
        //   }
    
        //ternary oprator using
          $userSetting[$uservalue] = empty($value)?$userDefaultDate[$uservalue]:$value;
    
       }
       //dd($userSetting);
       return $userSetting;
    }
}
