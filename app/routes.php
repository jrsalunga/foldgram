<?php



Route::get('/', array('as'=>'home', function(){
	return View::make('home')
				->with('title', 'The Foldagram')
				->with('page', 'home');
}));

Route::get('/about',  array('as'=>'about', function(){
	return View::make('about')
				->with('title', 'About Us - The Foldagram')
				->with('page', 'about');
	
}));


Route::post('/subscribe', array('before'=>'csrf', function(){
	$input = Input::all();
	$rules = array('email'=>'required|email');
	
	$validation = Validator::make($input, $rules);
	
	if ($validation->passes()) {
		Subscribe::create($input);
		return Redirect::to('/')
				->with('success', 'Great, you just signed up for our Newsletter!');
	}
	return Redirect::route('home')
			->withInput()
			->withErrors($validation)
			->with('error', 'There were validation errors.');
}));

Route::get('/login',  array('as'=>'login', function(){
	
}));

Route::post('/create',  array('as'=>'create', 'uses'=>'FoldagramController@create'));

Route::get('/pcredit',  array('as'=>'pcredit', function(){
	
}));

Route::get('/cart',  array('as'=>'cart', function(){
	
}));

Route::get('/contact',  array('as'=>'contact', function(){
	
}));

Route::get('/userlogin',  array('as'=>'userlogin', function(){
	
}));

Route::get('/register',  array('as'=>'register', function(){
	
}));




Route::get('/cart',  array('as'=>'cart', function(){
	//return Cart::message();
	return Foldgram::all();
}));










Route::get('/phpinfoko', function(){
	return phpinfo();
});

Route::get('/env', function(){
    return App::environment();
});

Route::get('/env/hostname', function(){
    return gethostname();
});

Route::get('/env/vars', function(){
    
    echo 'MANDRILL_APIKEY - '.getenv('MANDRILL_APIKEY');
});

Route::get('/checkdbconn', function(){
	if(DB::connection()->getDatabaseName()){
	   echo "connected sucessfully to database ".DB::connection()->getDatabaseName();
	}
});

