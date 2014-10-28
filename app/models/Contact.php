<?php
class Contact extends Eloquent {
	protected $table = 'contacts';
	protected $guarded = array('id');

	public function tenant(){
		return $this->belongsTo('Client');
	}
}