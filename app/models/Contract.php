<?php
class Contract extends Eloquent {
	protected $table = 'contracts';
	protected $guarded = array('id');

	public function lease(){
		return $this->belongsTo('Lease');
	}

	public function client(){
		return $this->hasOne('Client');
	}

	public $rules = [
	'moving_in' => 'required',
	'moving_out' => 'required',
	'lease_id' => 'required'
	];

	public $messages = [
	'required' => 'Feltet :attribute skal udfyldes.',
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