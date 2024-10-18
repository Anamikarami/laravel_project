<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//use this model in usersetting controller
class UsersSetting extends Model
{
   
    use HasFactory;
    protected $fillable = [
        'fullName',
        'company',
        'about',
        'job',
        'country',
        'phone',
        'address',
        'email',
       'user_id',
       'profile_image'
       
      ];

    
    protected $table = 'profile';


}
