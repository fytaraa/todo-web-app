<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [NotesController::class,'show']);
Route::post('/',[NotesController::class ,'add']);
Route::post('/addComment',[NotesController::class ,'addComment']);
Route::get('/update/{id}/{checked}',[NotesController::class,'update']);
Route::get('/delete/{id}',[NotesController::class,'delete']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('note');


