<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model{

	  protected $fillable = [
	    'name',
	    'logo',
	    'logo2',
	    'nit',
	    'phone',
	    'web',
		'highlighted',
		'highlighted_expiration',
	    'trash'
	  ];

}
