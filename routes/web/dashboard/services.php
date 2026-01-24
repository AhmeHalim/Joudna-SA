<?php

use app\Http\Controllers\Dashboard\Service\ServiceController;
use Illuminate\Support\Facades\Route;

Route::resource('services', ServiceController::class);
