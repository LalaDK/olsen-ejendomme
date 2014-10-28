<?php
class Client extends Eloquent {
	protected $table = 'clients';
	protected $guarded = array('id');

	public function contract(){
		return $this->belongsTo('Contract');
	}

	public function waiting_list(){
		return $this->belongsTo('Wait_List_Entry');
	}

	public function contacts(){
		return $this->hasMany('Contact');
	}


}