<?php

class Recipient extends Eloquent{
	protected $table = 'foldagram_reff_address';
	protected $fillable = array('fullname', 'country', 'address_one');
	
	public function foldagram(){
		return $this->belongsTo('Foldagram');
	}
}