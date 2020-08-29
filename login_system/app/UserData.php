<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class UserData extends Model
{
    //get data from table
    protected $table = 'users';
    protected $fillable = [
        'id','name', 'email','created_at'
    ];

    
}
