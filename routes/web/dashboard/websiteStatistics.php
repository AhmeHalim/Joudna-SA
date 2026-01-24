<?php

use app\Http\Controllers\Dashboard\WebsiteStatistics\WebsiteStatisticsController;
use Illuminate\Support\Facades\Route;


Route::resource('website-statistics', WebsiteStatisticsController::class);
