<?php

use app\Http\Controllers\Dashboard\Testimonial\TestimonialController;
use Illuminate\Support\Facades\Route;


Route::resource('testimonials', TestimonialController::class);
