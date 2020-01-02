<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{   protected  $table= 'files';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'site_id',
        'treasure_id',
        'name',
        'type',
        'drive_id'
    ];

}
