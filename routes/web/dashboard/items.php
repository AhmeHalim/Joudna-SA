<?php

use App\Http\Controllers\Dashboard\Item\ItemController;
use Illuminate\Support\Facades\Route;

Route::resource('items', ItemController::class);
