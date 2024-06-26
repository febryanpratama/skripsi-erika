<?php

use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/detail-konten/{id}', [FrontController::class, 'getDetailKontenMateri']);
Route::get('/get-quiz/{materi_id}', [FrontController::class, 'getQuiz']);
Route::get('/get-quiz-non', [FrontController::class, 'getQuizNon']);
Route::get('/get-quiz-nonmateri/{materi_id}', [FrontController::class, 'getQuizNonMateri']);
Route::post('/quiz/submit', [FrontController::class, 'submitQuiz']);

Route::post('get-jawaban', [FrontController::class, 'getJawaban']);
