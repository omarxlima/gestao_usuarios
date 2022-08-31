<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Support\Facades\Route;

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
Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');

Route::get('users',[UserController::class, 'index'])->name('users.index');
Route::get('users/create',[UserController::class, 'create'])->name('users.create');
Route::post('users',[UserController::class, 'store'])->name('users.store');
Route::get('users/{id}',[UserController::class, 'show'])->name('users.show');
Route::get('users/{id}/edit',[UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}',[UserController::class, 'update'])->name('users.update');
Route::delete('users/{id}',[UserController::class, 'destroy'])->name('users.destroy');




// Route::resource('users', UserController::class);




Route::get('/', function () {
    return view('welcome');
});
