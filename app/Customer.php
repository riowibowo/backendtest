<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{ 

	protected $table = 'm_customers';
	protected $fillable = ['name','address','telp','email'];

	public function subCategories() 
	{

   	 return $this->hasMany('App\User', 'id', 'id_user');

	}	
}