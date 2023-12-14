<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiaryController;
use App\Models\Diary;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DiaryController::class, 'index'])->name('diary.index');
// 글 쓰기
Route::get('/create_diary', [DiaryController::class, 'create']);
// 수정 폼
Route::get('/create_diary/{id}/edit', [DiaryController::class, 'edit'])->name('diary.edit');
// 글 수정
Route::put('/diary_show/{id}', [DiaryController::class, 'update'])->name('diary.update');
// 글 저장
Route::post('/dashboard', [DiaryController::class, 'store'])->name('diary.store');
// 글 읽기
Route::get('/show_diary/{id}', [DiaryController::class, 'show']);
// 글 삭제
Route::delete('/remove/{id}', [DiaryController::class, 'destroy']);

// 마이 페이지
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
