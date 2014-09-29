<?php

class Recipients extends Eloquent{
	protected $table = 'foldagram_reff_address';
	
	public function foldagram(){
		return $this->belongsTo('Foldagram');
	}
}