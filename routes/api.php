<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AddressController;

Route::get('/address/{zip}', [AddressController::class, 'address']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
