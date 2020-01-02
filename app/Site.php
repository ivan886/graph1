<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{   protected  $table= 'sites';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'lat',
        'lon'

    ];

    public function files()
    { return $this->hasMany('App\File');
    }



}
