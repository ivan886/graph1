<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treasure extends Model
{   protected  $table= 'treasures';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
    ];

    public function files()
    {   return $this->hasMany('App\File');
    }
}
