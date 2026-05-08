<?php

use App\Http\Controllers\Dashboard\BookTable\BookTableController;
use Illuminate\Support\Facades\Route;

Route::get('book-tables',[BookTableController::class, 'index'])->name('book-tables.index');
Route::delete('book-tables/destroy', [BookTableController::class, 'destroy'])->name('book-tables.destroy');
