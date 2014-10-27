<?php
class Wait_List_Entry extends Eloquent {
	protected $table = 'waiting_list';
	protected $guarded = array('id');

	public function company(){
		return $this->belongsTo('Company');
	}

	public function clients(){
		return $this->hasMany('Client');
	}
}