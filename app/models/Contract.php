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
}