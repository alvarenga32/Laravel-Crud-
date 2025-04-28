<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'api'], function () {

    Route::group(['prefix' => 'user'], function () {

        Route::get('/find-by-id/{id}' , [UserController::class, 'findById'])->name('api.user.find-by-id');
        Route::get('/find-all'        , [UserController::class, 'findAll'])->name('api.user.find-all');

        Route::post('/create'         , [UserController::class, 'create'])->name('api.user.create');

        Route::put('/update/{id}'     , [UserController::class, 'update'])->name('api.user.update');
        Route::delete('/delete/{id}'  , [UserController::class, 'delete'])->name('api.user.delete');

    });
});

Route::group(['prefix' => 'users'], function (){
    
    Route::get('/',    [UserController::class, 'index'])->name('users.home');
    Route::get('/novo',[UserController::class, 'create'])->name('users.novo');

    Route::get('/edit',[UserController::class, 'update'])->name('users.edit');
    
});
    