<?php

class FoldagramController extends BaseController {


	public function create(){
		$foldagram = new Foldagram;
		$foldagram->message = Input::get('message');
		$foldagram->save();

		return View::make('home');
	}


}