<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable = [
      'user_id', 'name', 'description', 'action'
    ];

    public $timestamps = false;
}
