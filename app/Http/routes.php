<?php

Route::get('/login',
    ['as' => 'auth.login',
     'uses' => 'LoginController@getLogin'
    ]);
Route::post('/postLogin', [
    'as' => 'auth.postLogin',
    'uses' => 'LoginController@postLogin']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', ['as' => 'auth.home', function () { return view('home'); }]);

//Redireccio al accedir una vista dins de la carptea resource
Route::get('/resource', function () {
//    $authenticated = false;
//    if (Session::has('authenticated')) {
//        if (Session::get('authenticated') == true ) {
//            $authenticated = true;
//        }
//    }
//
//    if ($authenticated) {
//        return view('resource');
//    } else {
//        return redirect()->route('auth.login');
//    }
    if(\Auth::check()){
        return view('resource');
    }else{
        return redirect()->route('auth.login');
    }

});
//exemple de middelware per controlar l'acces a un recurs 
Route::get('/resource',['as' => 'resource','middelware' => 'auth', 'uses' => 'LoginController@getLogin']);


Route::get('/flushSession',
    ['as' => 'session.flush',
     function() {
            Session::flush();
    }]
);

Route::get('/register',
    ['as' => 'register.register',
        'uses' => 'RegisterController@getRegister']
);

Route::post('/register',
    ['as' => 'register.postRegister',
        'uses' => 'RegisterController@postRegister']
);

/*
Route::get('/register',
    ['as' => 'checkEmailExists',
        'uses' => 'ApiController@checkEmailExists']
);*/

Route::get('/checkEmailExists',
    ['as' => 'checkEmailExists',
        'uses' => 'ApiController@checkEmailExists']
);
