<?php

use Illuminate\Support\Facades\Route;
use TransformStudios\Drafts\Http\Controllers\ViewDraftController;

Route::get('{id}', [ViewDraftController::class, '__invoke'])->name('drafts.show');
