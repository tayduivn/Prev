<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table = 'packages';
    public $timestamps = false;
    protected $casts = [
        'settings'  =>  'object',
        'price'  	=>  'object',
    ];
}
