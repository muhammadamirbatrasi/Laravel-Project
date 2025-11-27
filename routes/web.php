<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\FormController;
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


Route::resource('photos', PhotoController::class);

Route::get('/all_jobs', [JobsController::class, 'all_jobs'])->name('all_jobs');
Route::get('/add_job', [JobsController::class, 'add_job_form']);
Route::post('/add_job', [JobsController::class, 'add_job']);
Route::get('/edit_job/{id}', [JobsController::class, 'edit_job']);
Route::put('/update_job/{id}', [JobsController::class, 'update_job']);
Route::delete('/delete_job/{id}', [JobsController::class, 'delete_job']);

Route::get('/basic_form', [FormController::class, 'new_basic_form']);