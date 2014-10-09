<?php
class Company extends Eloquent {
	protected $table = 'companies';
	protected $guarded = array('id');

	public $tenants = array();

	public function realestates(){
		return $this->hasMany('Realestate');
	}
}