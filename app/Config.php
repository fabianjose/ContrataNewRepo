<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    protected $fillable = [
      'label',
      'value'
    ];

    //upper case
}