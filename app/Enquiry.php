<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = "enquirys";

    protected $fillable = [

        'first_name',
        'last_name', 
        'home_phone',
        'adress',
        'suburb',
        'post_code',
        'date_of_birth',
        'language_home',
        'parent_name',
        'parent_mobile',
        'parent_email',
        'parent_adress',
        'status',  
    ];    
}
