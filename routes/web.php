<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoFormController;

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


Route::get('/',[InfoFormController::class,'Form'])->name('Form');
Route::post('/store',[InfoFormController::class,'FormStore'])->name('FormStore');
Route::get('/edit/{id}',[InfoFormController::class,'EditForm'])->name('EditForm');
Route::put('/{id}',[InfoFormController::class,'UpdateForm'])->name('UpdateForm');
Route::get('/{id}',[InfoFormController::class,'DeleteForm'])->name('DeleteForm');