<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', [ContactController::class, 'index']);
Route::get('/find', [ContactController::class, 'find']);
Route::get('/search', [ContactController::class, 'search']);

//入力ページ
Route::get('/contact',[ContactController::class, 'contact']);
//確認ページ
Route::post('/contact/confirm',[ContactController::class, 'confirm']);
//送信完了ページ
Route::post('/contact/create', [ContactController::class, 'create']);
Route::get('/delete', [ContactController::class, 'delete']);
Route::post('/delete', [ContactController::class, 'remove']);
