<?php
class Company extends Eloquent {
	protected $table = 'companies';
	protected $guarded = array('id');

	public $tenants = array();

	public function realestates(){
		return $this->hasMany('Realestate');
	}

	public $errors;

	public static $rules = [
	'name' => 'required',
	'vat_number' => 'required',
	'registration_number' => 'required'
	];

	public function isValid($data){
		$validation = Validator::make($data,static::$rules);
		if($validation->passes()){
			return true;
		}
		$this->errors = $validation->messages();
		return false;
	}
}