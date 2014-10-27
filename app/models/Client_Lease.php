<?php
class Client_Lease extends Eloquent {
	protected $table = 'client_leases';
	protected $guarded = array('id');

	public function lease(){
		return $this->belongsTo('Lease');
	}

	public function client(){
		return $this->hasOne('Client');
	}
}