<?php

class FoldagramController extends BaseController {


	public function create(){


		//return Input::file();
		//return dd(Input::file('image'));

		
		$foldagram = new Foldagram;
		$foldagram->message = Input::get('message');

		if(Input::hasFile('image')){
			
			Input::file('image')->move($destinationPath, $filename);

			$filename = Input::file('image')->getClientOriginalName() .'.'. Input::file('image')->getClientOriginalExtension();
			$destinationPath = 'img/uploads/';
			$thumnailPath = 'img/thumbnails/'.$filename;
					
			Image::make($destinationPath.$filename)->resize(100,100)->save($thumnailPath);
			
			
		}

		$foldagram->image = $filename;
		$foldagram->save();

		

		return Redirect::route('home')
				->with('title', 'The Foldagram')
				->with('page', 'home');
		
	}


}