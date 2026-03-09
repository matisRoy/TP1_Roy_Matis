<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\SportController;

Route::apiResources([
    'users' => UserController::class,
    'rentals' => RentalController::class,
    'reviews' => ReviewController::class,
    'categories' => CategoryController::class,
    'equipment' => EquipmentController::class,
    'sports' => SportController::class,
]);
