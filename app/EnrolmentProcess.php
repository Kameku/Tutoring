<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolmentProcess extends Model
{
    protected $table = "enrolmentProcess";

    protected $fillable = [

        'description',
        'responsiblePerson',
        'actions',
         
    ]; 
}
