<?php

use App\Http\Controllers\Dashboard\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);
