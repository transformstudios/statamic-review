<?php

use Illuminate\Support\Facades\Route;
use TransformStudios\Drafts\Http\Controllers\ViewDraftController;

Route::name('drafts.')->group(function () {
    Route::get('{id}', [DraftController::class, '__invoke'])->name('show');
});
