<?php

class Foldagram extends Eloquent {
	protected $table = 'foldagram';
	
	public function recipients(){
		return $this->hasMany('recipient');
	}
}