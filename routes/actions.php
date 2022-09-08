<?php

use Illuminate\Support\Facades\Route;
use Statamic\Http\Middleware\AddViewPaths;
use Statamic\StaticCaching\Middleware\Cache;
use TransformStudios\Review\Http\Controllers\ReviewController;
use TransformStudios\Review\Http\Middleware\SetSite;

Route::get('{id}', [ReviewController::class, '__invoke'])
    ->middleware([
        SetSite::class,
        AddViewPaths::class,
        Cache::class,
    ])->name('review.show');
