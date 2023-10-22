<?php

use Illuminate\Support\Facades\Route;
use MaabJavaid\UserLib\Http\Controllers\Api\V1\UserController;

Route::resource('requer-user', UserController::class);
