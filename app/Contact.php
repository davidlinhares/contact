<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'phoneNumber', 'company', 'email', 'address', 'website', 'comments'
    ];
}