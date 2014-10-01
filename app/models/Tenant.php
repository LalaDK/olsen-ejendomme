<?php
class Realestate extends Eloquent {
	protected $table = 'tenants';
	protected $guarded = array('id');

	public function company(){
		return $this->belongsTo('Lease');
	}
}