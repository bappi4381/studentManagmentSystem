<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherStuController;
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

Route::middleware(['auth', 'user-access:student'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Routes for teachers
Route::middleware(['auth', 'user-access:teacher'])->group(function () {
    Route::get('/teacher/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/sections', [TeacherStuController::class, 'showSections'])->name('sections.show');
    Route::post('/sections', [TeacherStuController::class, 'createSection'])->name('sections.create');
    Route::get('/sections/{sectionId}/add-student', [TeacherStuController::class, 'indexStudent'])->name('students.create');
    Route::post('/sections/{sectionId}/add-student', [TeacherStuController::class, 'addStudent'])->name('students.store');
    Route::get('/teacher/students', [TeacherStuController::class, 'showAllStudent'])->name('students.index');
});

// Routes for guardians
Route::middleware(['auth', 'user-access:guardian'])->group(function () {
    Route::get('/guardian/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// Define the logout route outside of the middleware groups
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');