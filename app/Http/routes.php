<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use EloquentORM\User;

Route::get('/create', function () {
    $user = User::create([
        'name' => 'Willy Gomez',
        'email' => 'wp_gomez@dlirio.com.pe',
        'password' => bcrypt('123456'),
        'gender' => 'm',
        'biography' => 'Profesor de programación'
    ]);

    return 'Usuario Creado';
});

Route::get('/update-user', function(){
    $user = User::find(1);

    $user->gender = 'm';
    $user->biography = 'Profesor de programación';
    $user->save();

    return 'Usuario Modificado';
});