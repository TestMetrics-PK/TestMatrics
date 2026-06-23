<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuestionController;

Route::get('/questions', [QuestionController::class, 'index']);
Route::get('/questions/{id}', [QuestionController::class, 'show']);
