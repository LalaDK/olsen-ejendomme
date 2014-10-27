<?php
class Lease extends Eloquent {
	protected $table = 'leases';
	protected $guarded = array('id');

	public function realestate(){
		return $this->belongsTo('Realestate');
	}

	public function client_leases(){
		return $this->hasMany('Client_Lease');
	}
}