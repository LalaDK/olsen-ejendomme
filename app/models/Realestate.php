<?php
class Realestate extends Eloquent {
	protected $table = 'realestates';
	protected $guarded = array('id');

	public function company(){
		return $this->belongsTo('Company');
	}
}