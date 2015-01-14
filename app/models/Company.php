<?php
class Company extends Eloquent {
	protected $table = 'companies';
	protected $guarded = array('id');

	public $tenants = array();

	public function realestates(){
		return $this->hasMany('Realestate');
	}

	public function wait_list_entry(){
		return $this->hasMany('WaitingList');
	}

	public $errors;
	public $rules = [
	'name' => 'required|unique:companies',
	'vat_number' => 'required',
	'registration_number' => 'required'
	];

	public $messages = [
		'required' => 'Feltet :attribute skal udfyldes.',
		'unique' 	=> 'Firmaet findes allerede.'
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