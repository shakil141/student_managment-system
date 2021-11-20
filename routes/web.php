<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\SomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
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

Route::get('/', function () {
    return view('backend.dashboard');
})->name('dashboard');

Route::resource('student',StudentController::class);

Route::resource('class', ClassController::class);

Route::resource('teacher', TeacherController::class);

Route::resource('subject', SubjectController::class);

Route::get('/mark', [MarksController::class , 'index'])->name('mark.index');

Route::post('mark-store',[MarksController::class, 'markStore'])->name('mark.store');

Route::get('class-wise-subject/{menuId}',[MarksController::class,'classWiseSubject']);

Route::get('class-wise-student/{menuId}',[MarksController::class,'classWiseStudent']);

Route::get('un-active/{class_id}',[SomeController::class,'unactive'])->name('un_active');

Route::get('active/{class_id}',[SomeController::class,'active'])->name('active');

Route::get('mail-sent/{id}',[MarksController::class , 'sentMail'])->name('sent.mail');
