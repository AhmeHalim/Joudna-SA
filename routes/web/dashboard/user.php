
<?php

use App\Http\Controllers\Dashboard\CategoryController;
use app\Http\Controllers\Dashboard\User\PermissionController;
use app\Http\Controllers\Dashboard\User\RoleController;
use app\Http\Controllers\Dashboard\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->name('users.')->group(function () {

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});




