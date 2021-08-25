<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model{

	  protected $fillable = [
	    'name',
	    'logo',
	    'nit',
	    'phone',
	    'web',
		'highlighted',
		'highlighted_expiration',
	    'trash'
	  ];

}
