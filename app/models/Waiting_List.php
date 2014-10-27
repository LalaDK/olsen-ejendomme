<?php
class Waiting_List extends Eloquent {
	protected $table = 'Waiting_List';
	protected $guarded = array('id');

	public function company(){
		return $this->belongsTo('Company');
	}

	public function clients(){
		return $this->hasMany('Client');
	}
}