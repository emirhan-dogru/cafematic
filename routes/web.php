<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SessionController;
use App\Http\Controllers\Backend\TableController;
use App\Http\Controllers\Backend\FoodController;
use App\Http\Controllers\Backend\IncomeController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/' , [SessionController::class , 'index'])->name('home.Index');


Route::get('/sessions' , [SessionController::class , 'index'])->name('sessions.Index');
Route::get('/sessions/add' , [SessionController::class , 'create'])->name('sessions.Create');
Route::post('/sessions/insert' , [SessionController::class , 'store'])->name('sessions.Store');
Route::get('/sessions/edit/{slug}' , [SessionController::class , 'edit'])->name('sessions.Edit');
Route::post('/sessions/insert/session/{id}/product/{product_id}' , [SessionController::class , 'AddProduct'])->name('sessions.AddProduct');
Route::get('/sessions/delete/{session_id}' , [SessionController::class , 'delete'])->name('sessions.Delete');


Route::get('/incomes' , [IncomeController::class , 'index'])->name('income.Index');




Route::get('/tables' , [TableController::class , 'index'])->name('tables.Index');
Route::get('/tables/add' , [TableController::class , 'create'])->name('tables.Create');
Route::post('/tables/insert' , [TableController::class , 'store'])->name('tables.Store');
Route::get('/tables/edit/{slug}' , [TableController::class , 'edit'])->name('tables.Edit');
Route::post('/tables/update/{slug}' , [TableController::class , 'update'])->name('tables.Update');
Route::get('/tables/delete/{slug}' , [TableController::class , 'delete'])->name('tables.Delete');


Route::get('/foods' , [FoodController::class , 'index'])->name('foods.Index');
Route::get('/foods/add' , [FoodController::class , 'create'])->name('foods.Create');
Route::post('/foods/insert' , [FoodController::class , 'store'])->name('foods.Store');
Route::get('/foods/edit/{slug}' , [FoodController::class , 'edit'])->name('foods.Edit');
Route::post('/foods/update/{slug}' , [FoodController::class , 'update'])->name('foods.Update');
Route::get('/foods/delete/{slug}' , [FoodController::class , 'delete'])->name('foods.Delete');


