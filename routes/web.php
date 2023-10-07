<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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
Route::get('/admin/dashboard', [AdminController\DashboardController::class, 'showDashboard'])->middleware('auth')->name('show.dashboard');
Route::get('/admin-login', [AdminController\LoginController::class, 'showLogin'])->name('show.admin.login');
Route::post('/admin-login', [AdminController\LoginController::class, 'login'])->name('admin.login');
Route::get('/admin-forget-password', [AdminController\LoginController::class, 'forgetPassword'])->name('forget.password');
Route::post('/admin-forget-password', [AdminController\LoginController::class, 'forgetPasswordPost'])->name('forget.password.post');
Route::get('/admin-reset-password/{token}', [AdminController\LoginController::class, 'resetPassword'])->name('reset.password');
Route::post('/admin-reset-password', [AdminController\LoginController::class, 'resetPasswordPost'])->name('reset.password.post');
Route::post('/admin-logout', [AdminController\LoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/user', [AdminController\UserController::class, 'showUser'])->middleware('auth')->name('show.user');
Route::get('/admin/add-user', [AdminController\UserController::class, 'addUser'])->middleware('auth')->name('add.user');
Route::post('/admin/add-user', [AdminController\UserController::class, 'addUserPost'])->middleware('auth')->name('add.user.post');
Route::get('/admin/update-user/{id}', [AdminController\UserController::class, 'updateUser'])->middleware('auth')->name('update.user');
Route::patch('/admin/update-user/{id}', [AdminController\UserController::class, 'updateUserPost'])->middleware('auth')->name('update.user.post');
Route::delete('/admin/delete-user/{id}', [AdminController\UserController::class, 'deleteUser'])->middleware('auth')->name('delete.user');
Route::get('/admin/user-info', [AdminController\UserController::class, 'userInfo'])->middleware('auth')->name('user.info');
Route::patch('/admin/update-img/{id}', [AdminController\UserController::class, 'updateImg'])->middleware('auth')->name('update.img');



Route::get('/admin/question', [AdminController\QuesController::class, 'showQuestion'])->middleware('auth')->name('show.question');
Route::get('/admin/answer/{id}', [AdminController\QuesController::class, 'answer'])->middleware('auth')->name('answer');
Route::patch('/admin/answer/{id}', [AdminController\QuesController::class, 'answerPost'])->middleware('auth')->name('answer.post');
Route::get('/admin/add-question', [AdminController\QuesController::class, 'addQuestion'])->middleware('auth')->name('add.question');
Route::post('/admin/add-question', [AdminController\QuesController::class, 'addQuestionPost'])->middleware('auth')->name('add.question.post');
Route::get('/admin/update-question/{id}', [AdminController\QuesController::class, 'updateQuestion'])->middleware('auth')->name('update.question');
Route::patch('/admin/update-question/{id}', [AdminController\QuesController::class, 'updateQuestionPost'])->middleware('auth')->name('update.question.post');
Route::get('/get-unanswered-question-count', [AdminController\QuesController::class, 'getUnansweredQuestionCount'])->middleware('auth');
Route::get('/admin/new-question', [AdminController\QuesController::class, 'newQuestion'])->middleware('auth')->name('new.question');
Route::delete('/admin/delete-question/{id}', [AdminController\QuesController::class, 'deleteQuestion'])->middleware('auth')->name('delete.question');