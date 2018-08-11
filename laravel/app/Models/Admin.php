<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Feb 2018 18:55:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 * 
 * @property int $id
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email_address
 * @property string $phone_no
 *
 * @package App\Models
 */
class Admin extends Eloquent
{
	protected $table = 'admin';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'firstname',
		'lastname',
		'email_address',
		'phone_no'
	];
	
	
	public function user(){

		return $this->belongsTo('App\Models\User');
	}

	public function name(){
		return $this->firstname . ' ' . $this->lastname;
	}

    public function firstname(){
    	return $this->firstname;
    }
}
