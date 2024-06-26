<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\EmailValidatorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



//Authentication
Route::post('/signup', [AuthenticationController::class,'register'])->name('register');
Route::post('/signin', [AuthenticationController::class,'login'])->name('login');
Route::get('/user-logout',[AuthenticationController::class,'logout'])->middleware('auth:sanctum')->name('logout');

//Email Verification Routes
Route::controller(EmailValidatorController::class)->middleware('auth:sanctum')->group(function () {
    Route::post('/emailValidator','emailValidator')->name('Product.store');
});

