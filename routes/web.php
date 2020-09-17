<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user',[UserController::class,'index']);
Route::post('/upload',[UserController::class,'uploadAvatar']);

Route::get('/todos',[TodoController::class,'index'])->name('todos.index');
Route::get('/todos/create',[TodoController::class,'create']);
Route::patch('/todos/{todo}/update',[TodoController::class,'update'])->name('todo.update');
Route::get('/todos/{todo}/edit',[TodoController::class,'edit']);
Route::put('/todos/{todo}/complete',[TodoController::class,'complete'])->name('todo.complete');
Route::get('/todos/{todo}/show',[TodoController::class,'show'])->name('todo.show');
Route::delete('/todos/{todo}/incomplete',[TodoController::class,'incomplete'])->name('todo.incomplete');
Route::delete('/todos/{todo}/delete',[TodoController::class,'delete'])->name('todo.delete');

Route::post('/todos/create',[TodoController::class,'store']);



