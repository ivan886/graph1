<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{   protected  $table= 'sites';
    protected $primaryKey = 'id';
    public    $timestamps = false;
    protected $fillable = [
        'name',
        'description'        

    ];


}
