<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alo', function () {
    return view('users.index');
});

Route::group(['prefix' => 'api'], function () {

    Route::group(['prefix' => 'user'], function () {

        Route::get('/find-by-id/{id}' , [UserController::class, 'findById']);
        Route::get('/find-all'        , [UserController::class, 'findAll']);

        Route::post('/create'         , [UserController::class, 'create']);

        Route::put('/update/{id}'     , [UserController::class, 'update']);
        Route::delete('/delete/{id}'  , [UserController::class, 'delete']);

    });
});
