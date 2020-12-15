<?php

use Illuminate\Support\Facades\Route;
use Transformstudios\Drafts\Http\Controllers\DraftController;

Route::name('drafts.')->group(function () {
    Route::get('{id}', [DraftController::class, '__invoke'])->name('show');
});
