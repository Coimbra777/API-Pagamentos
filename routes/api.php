<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Ex: http://localhost:8989/api/v1/users
Route::prefix('v1')->group(function () {
  Route::get('/users', [UserController::class, 'index']);
  Route::get('/users/{user}', [UserController::class, 'show']);
  Route::get('/invoices', [InvoiceController::class, 'index']);
  Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
  Route::post('/invoices', [InvoiceController::class, 'store']);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix(prefix: 'v1')->group(function () {
//     Route::get('/users', [UserController::class, 'index']);
// });
