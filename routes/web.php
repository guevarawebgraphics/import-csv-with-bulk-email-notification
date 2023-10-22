<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sending-queue-emails', [App\Http\Controllers\Controller::class, 'sendRequestMail'])->name('send.request.mail');

Route::get('/import', [App\Http\Controllers\ImportController::class, 'index']);

Route::post('/import', [App\Http\Controllers\ImportController::class, 'import']);

Route::get('/verify/{email}', [App\Http\Controllers\ImportController::class, 'verify']);

Route::post('/confirm/verify/{id}', [App\Http\Controllers\ImportController::class, 'confirmVerify'])->name('verify.now');