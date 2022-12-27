<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\GenerationsController as BackendUserController;

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

Route::get('/backend/user', [BackendUserController::class, 'index'])->name('backend.manage.user');
Route::get('/backend/create/user', [BackendUserController::class, 'create'])->name('backend.create.user');
Route::post('/backend/create/process', [BackendUserController::class, 'create_process'])->name('backend.create.process.user');
Route::get('/backend/edit/user/{userrole}', [BackendUserController::class, 'edit'])->name('backend.edit.user');
Route::post('/backend/edit/process/{userrole}', [BackendUserController::class, 'edit_process'])->name('backend.edit.process.user');
Route::delete('/backend/delete/{userrole}', [BackendUserController::class, 'destroy'])->name('backend.delete.user');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
