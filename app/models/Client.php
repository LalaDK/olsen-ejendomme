<?php
class Client extends Eloquent {
	protected $table = 'clients';
	protected $guarded = array('id');

	public function contract(){
		return $this->belongsTo('Contract');
	}

	public function waiting_list(){
		return $this->belongsTo('Wait_List_Entry');
	}

	public function contacts(){
		return $this->hasMany('Contact');
	}

	public $errors;

	public $rules = [
	'firstname' => 'required',
	'lastname' => 'required',
	'street_name' => 'required',
	'street_number' => 'required',
	'zipcode' => 'required',
	'city' => 'required',
	'phone' => 'required',
	'mobile_phone' => 'required',
	'email' => 'required'
	];

	public $messages = [
	'required' => 'Feltet :attribute skal udfyldes.'
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