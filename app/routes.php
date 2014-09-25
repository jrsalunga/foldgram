<?php



Route::get('/', function(){
	return View::make('hello');
});



Route::get('/phpinfoko', function(){
	return phpinfo();
});

Route::get('/env', function(){
    return App::environment();
});

Route::get('/env/hostname', function(){
    return gethostname();
});

Route::get('/checkdbconn', function(){
	if(DB::connection()->getDatabaseName()){
	   echo "connected sucessfully to database ".DB::connection()->getDatabaseName();
	}
});

