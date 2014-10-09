<?php
class Lease extends Eloquent {
	protected $table = 'leases';
	protected $guarded = array('id');

	public function realestate(){
		return $this->belongsTo('Realestate');
	}

	public function tenant(){
		return $this->hasMany('Tenant');
	}
}