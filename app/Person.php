<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{   protected  $table= 'persons';
    protected $primaryKey = 'id';
    protected $fillable = [
    'name',
    'lastname',
    'telephone',
    'email',
    'imei'
   ];

}
