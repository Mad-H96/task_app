<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\TaskController;

Route::group(['middleware' =>'revalidate'], function(){



Route::get('/', [authController::class , 'login']) -> name('login');

Route::post('/', [authController::class , 'loginPost']) -> name('login.post');

Route::get('/register', [authController::class , 'register']) -> name('register') ;

Route::post('/register', [authController::class , 'registerPost']) -> name('register.post') ;



Route::group(['middleware' =>'auth'], function(){

    Route::post('/logout', [authController::class , 'logout']) -> name('logout') ;

    Route::get('/home', function () {
        return view('welcome');
    })-> name('home');

    Route::get('/profile', function(){

        return "Hi";

    }) -> name('profile'); 

    Route::get('/task', [TaskController::class , 'TaskView']) -> name('taskView');

    Route::post('/savetask', [TaskController::class , 'SaveTask']) -> name('saveTask');

    Route::get('/markAsCompleted/{id}', [TaskController::class , 'markCompleted']);

    Route::get('/markAsNotCompleted/{id}', [TaskController::class , 'markNotCompleted']);

    Route::get('/taskDelete/{id}', [TaskController::class , 'DeleteTask']);

    Route::get('/taskUpdate/{id}', [TaskController::class , 'UpdateTask']);

    Route::post('/upTask', [TaskController::class , 'UpdateTaskNow']);

    Route::get('/backToHome', [TaskController::class , 'backHome']);

});

});


