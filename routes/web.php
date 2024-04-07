<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});

Route::get('application', function(){
    return view('front.application');
});


Route::prefix('materi')->group(function(){
    Route::get('/', [FrontController::class, 'indexMateri']);
    Route::get('/{materi_id}/konten', [FrontController::class, 'indexKontenMateri']);
    Route::get('/quiz/{materi_id}', [MateriController::class, 'indexQuiz']);
    Route::get('/quiz/{materi_id}/nonmateri', [MateriController::class, 'indexQuizNonMateriFront']);
});

Route::prefix('quiz')->group(function(){
    Route::get('/', [FrontController::class, 'indexQuiz']);
});

Route::get('bantuan', function(){
    return view('front.bantuan');
});
Route::get('tentang-aplikasi', function(){
    return view('front.tentang');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'verified'],
],function(){
    Route::prefix('materi')->group(function(){
        Route::get('/', [MateriController::class, 'index']);
        Route::post('/', [MateriController::class, 'store']);

        Route::get('/{materi_id}/konten', [MateriController::class, 'indexKontenMateri']);
        Route::get('/{materi_id}/soal', [MateriController::class, 'indexKontenSoal']);


        Route::post('/detail-materi', [MateriController::class, 'postKontenMateri']);
        Route::post('/detail-soal', [MateriController::class, 'postKontenSoal']);

        Route::get('/detail-soal/{soal_id}', [MateriController::class, 'getDetailSoal']);

        Route::post('detail-jawaban', [MateriController::class, 'postJawaban']);


        // Route::get('/quiz/{materi_id}', [MateriController::class, 'indexQuiz']);
    });

    Route::prefix('quiz')->group(function(){
        Route::get('/', [MateriController::class, 'indexQuizList']);
        Route::get('/{materi_id}', [MateriController::class, 'indexQuizNonMateri']);
        Route::post('/{materi_id}', [MateriController::class, 'storeQuizNonMateri']);
        Route::get('/{materi_id}/detail-jawaban/{soal_id}', [MateriController::class, 'getDetailJawaban']);
        Route::post('/{materi_id}/detail-jawaban', [MateriController::class, 'postDetailJawaban']);
    });
});

require __DIR__.'/auth.php';
