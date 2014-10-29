<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = [''];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public $errors;

	public $rules = [
	'name' => 'required',
	'username' => 'required|unique:user',
	'password'         => 'required',
	'confirm_password' => 'required|same:password' 	
	];

	public $messages = [
	'required' => 'Feltet :attribute skal udfyldes.',
	'unique' 	=> 'Firmaet findes allerede.',
	'same' => 'De 2 kodeord matcher ikke'
	];

	public function isValid($data){
		$validation = Validator::make($data, $this->rules, $this->messages);
		if($validation->passes()){
			return true;
		}
		$this->errors = $validation->messages();
		return false;
	}

}
