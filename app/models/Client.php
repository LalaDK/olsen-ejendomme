<?php
class Client extends Eloquent {
	protected $table = 'clients';
	protected $guarded = array('id');

	public function client_lease(){
		return $this->belongsTo('Client_Lease');
	}

	public function waiting_list(){
		return $this->belongsTo('Waiting_List');
	}

	public function contacts(){
		return $this->hasMany('Contact');
	}


}