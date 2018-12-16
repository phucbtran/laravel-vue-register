<?php

Route::get('/{any}', function(){
    return view('app');
})->where('any', '.*');
//Route::get('test', 'Auth\RegisterController@test');