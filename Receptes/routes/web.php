<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RecipeController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/welcome',[RecipeController::class,'index'])->name('welcome');

Route::post('/recipe',[RecipeController::class,'store'])->name('recipe.store');
Route::get('/crear',[RecipeController::class,'create'])->name('recipe.create');
Route::get('/mostrar/{id}',[RecipeController::class,'show'])->name('recipe.show');

Route::post('/comments',[CommentController::class,'store'])->name('comment.create');

Route::get('/categoria/{id}',[CategoryController::class,'show'])->name('category.show');

