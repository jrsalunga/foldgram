<?php


class Subscribe extends Eloquent {

	protected $table = 'subscribe'; // not the default: 'subscribes'
	protected $fillable = array('email');
}