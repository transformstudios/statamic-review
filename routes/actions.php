<?php

use Illuminate\Support\Facades\Route;
use TransformStudios\Review\Http\Controllers\ReviewController;

Route::get('{id}', [ReviewController::class, '__invoke'])->name('review.show');
