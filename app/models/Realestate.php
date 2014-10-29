
<?php
class Realestate extends Eloquent {
	protected $table = 'realestates';
	protected $guarded = array('id');

	public function company(){
		return $this->belongsTo('Company');
	}

	public function leases(){
		return $this->hasMany('Lease');
	}
	public $errors;

	public $rules = [
	'street_name' => 'required',
	'street_number' => 'required',
	'city' => 'required',
	'zip_code' => 'required',
	'leases' => 'required',
	'build_date' => 'required',
	'purchase_value' => 'required',
	'outer_sqm' => 'required',
	'inner_sqm' => 'required',
	'ground_area' => 'required',
	'company' => 'required'
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