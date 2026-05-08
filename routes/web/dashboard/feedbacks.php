<?php

use App\Http\Controllers\Dashboard\Feedback\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('feedbacks',          [FeedbackController::class, 'index'])->name('feedbacks.index');
Route::delete('feedbacks/destroy', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
