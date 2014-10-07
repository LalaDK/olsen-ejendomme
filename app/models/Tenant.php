<?php
class Realestate extends Eloquent {
	protected $table = 'tenants';
	protected $guarded = array('id');

	public function lease(){
		return $this->belongsTo('Lease');
	}

	public function contacts(){
		return $this->hasMany('Contact');
	}
}