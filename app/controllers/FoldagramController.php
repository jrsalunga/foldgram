<?php

class FoldagramController extends BaseController {


	public function create(){


		//return Input::all();
		//return dd(Input::file('image'));


		
		$foldagram = new Foldagram;
		$foldagram->message = Input::get('message');

		


		if(Input::hasFile('image')){
			
			

			$filename = Input::file('image')->getClientOriginalName() .'.'. Input::file('image')->getClientOriginalExtension();
			$destinationPath = 'img/uploads/';
			$thumnailPath = 'img/thumbnails/'.$filename;

			Input::file('image')->move($destinationPath, $filename);
					
			Image::make($destinationPath.$filename)->resize(100,100)->save($thumnailPath);
		}

		$foldagram->image = isset($filename) ? $filename:'no-pic.jpg';
		$foldagram->save();

		$recipients_input = Input::get('address');
		if(!empty($recipients_input)){
			
			foreach($recipients_input as $value){	
				$recipient = new Recipient;
				
				$recipient->fullname = $value['fullname'];
				$recipient->address_one = $value['address_one'];

				$foldagram->recipients()->save($recipient);
				
			}
			
		}

		

		

		return Redirect::route('home')
				->with('title', 'The Foldagram')
				->with('page', 'home');
		
	}


}