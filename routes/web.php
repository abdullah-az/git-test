<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route to display the question generation page
Route::get('/questions/generate', [QuestionController::class, 'showGenerateForm'])->name('questions.generate');

// Route to handle the question generation request
Route::post('/questions/generate', [QuestionController::class, 'generate'])->name('questions.generate.post');

// Route to display a specific question and its explanation
Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');

// Route to display all questions
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

