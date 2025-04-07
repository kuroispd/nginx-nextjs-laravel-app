<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

Route::get('/index', [ApiController::class, 'index'])->name('api.index');