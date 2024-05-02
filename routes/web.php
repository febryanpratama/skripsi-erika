<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
    Route::get('/', [FrontController::class, 'indexQuizNonMateri']);
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
        Route::post('/edit', [MateriController::class, 'edit']);
        Route::get('/delete/{materi_id}', [MateriController::class, 'delete']);
        
        Route::get('/{materi_id}/konten', [MateriController::class, 'indexKontenMateri']);
        Route::get('/{materi_id}/soal', [MateriController::class, 'indexKontenSoal']);
        Route::post('/set-ordering', [MateriController::class, 'setOrdering']);
        
        
        Route::post('/detail-materi', [MateriController::class, 'postKontenMateri']);
        Route::get('/detail-materi/delete/{detail_materi_id}', [MateriController::class, 'deleteDetailMateri']);
        Route::post('/detail-soal', [MateriController::class, 'postKontenSoal']);
        Route::post('/detail-soal/edit', [MateriController::class, 'postKontenSoalEdit']);
        Route::get('/detail-soal/delete/{soal_id}', [MateriController::class, 'deleteDetailSoal']);

        Route::get('/detail-soal/{soal_id}', [MateriController::class, 'getDetailSoal']);

        Route::post('detail-jawaban', [MateriController::class, 'postJawaban']);
        Route::post('/detail-jawaban/edit', [MateriController::class, 'postJawabanEdit']);


        // Route::get('/quiz/{materi_id}', [MateriController::class, 'indexQuiz']);
    });

    Route::prefix('quiz')->group(function(){
        Route::get('/', [MateriController::class, 'indexQuizList']);
        Route::get('/{materi_id}', [MateriController::class, 'indexQuizNonMateri']);
        Route::post('/', [MateriController::class, 'storeQuizNonMateri']);
        Route::get('/detail-jawaban/{soal_id}', [MateriController::class, 'getDetailJawabanNonMateri']);
        Route::post('/detail-jawaban', [MateriController::class, 'postDetailJawaban']);
    });

    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::post('/update', [UserController::class, 'update']);
        Route::get('/delete/{user_id}', [UserController::class, 'delete']);
    });
});

require __DIR__.'/auth.php';
