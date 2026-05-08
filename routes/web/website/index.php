<?php

use app\Http\Controllers\WebSite\HomeController;
use Illuminate\Support\Facades\Route;

Route::name('website.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/about-us', [HomeController::class, 'about_us'])->name('about_us');

    Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact_us');
    Route::post('/contact-us-save', [HomeController::class, 'contact_us_save'])->name('contact-us-save');

    Route::get('/gallery-images', [HomeController::class, 'galleryImages'])->name('gallery-images');
    Route::get('/gallery-videos', [HomeController::class, 'galleryVideos'])->name('gallery-videos');
    Route::get('/menu', [HomeController::class, 'menu'])->name('menu');

    Route::get('/feed-back', [HomeController::class, 'feedBack'])->name('feed-back');
    Route::post('/feed-back-save', [HomeController::class, 'feedback_save'])->name('feedback-save');

    Route::get('book-table',  [HomeController::class, 'book_table'])->name('book-table');
    Route::post('book-table', [HomeController::class, 'book_table_save'])->name('book-table-save');
});
