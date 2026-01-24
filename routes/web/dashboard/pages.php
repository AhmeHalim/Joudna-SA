<?php

use app\Http\Controllers\Dashboard\Page\PageController;
use Illuminate\Support\Facades\Route;


Route::resource('pages', PageController::class);

