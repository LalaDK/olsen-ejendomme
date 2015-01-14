<?php

class WaitingList extends Eloquent {
	protected $table = 'wait_list_entry';
	protected $guarded = array('id');

	public function company(){
		return $this->belongsTo('Company');
	}

	public function clients(){
		return $this->belongsTo('Client');
	}
}