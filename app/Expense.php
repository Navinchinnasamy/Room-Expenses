<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
	protected $table = 'expenses';
	
	public function user(){
		return $this->belongsTo('App\User', 'id', 'purchased_by');
	}
}
