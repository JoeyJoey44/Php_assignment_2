<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticlesController;

Route::get('articles', [ArticlesController::class, 'index']);
