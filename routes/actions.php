<?php

use Illuminate\Support\Facades\Route;
use TransformStudios\Review\Http\Controllers\ReviewController;
use TransformStudios\Review\Http\Middleware\SetSite;

Route::get('{id}', [ReviewController::class, '__invoke'])
    ->middleware([
        SetSite::class,
        AddViewPaths::class,
    ])->name('review.show');
