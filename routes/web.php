<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ChangePassWord;
use App\Http\Controllers\UserInfo;

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
Route::get('/user-info', [UserInfo::class, 'userInfo'])->name('user.info');
Route::POST('/updateProfile',[UserInfo::class,'updateInfo'])->name('user.info_update');
Route::POST('/update-avatar', [UserInfo::class, 'updateAvatar'])->name('upload.image');
Route::get('/change-password',[ChangePassWord::class,'showchange'])->name('user.changePass');
Route::POST('/update-password',[ChangePassWord::class,'update'])->name('user.updatePass');




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
Route::patch('/admin/status/{id}', [AdminController\QuesController::class, 'status'])->middleware('auth')->name('status');


Route::get('/client-login', [ClientController\LoginController::class, 'showLogin'])->name('show.client.login');
Route::post('/client-login', [ClientController\LoginController::class, 'login'])->name('client.login');
Route::get('/client-forget-password', [ClientController\LoginController::class, 'forgetPassword'])->name('client.forget.password');
Route::post('/client-forget-password', [ClientController\LoginController::class, 'forgetPasswordPost'])->name('client.forget.password.post');
Route::get('/client-reset-password/{token}', [ClientController\LoginController::class, 'resetPassword'])->name('client.reset.password');
Route::post('/client-reset-password', [ClientController\LoginController::class, 'resetPasswordPost'])->name('client.reset.password.post');
Route::post('/client-register', [ClientController\LoginController::class, 'register'])->name('register');
Route::post('/client-logout', [ClientController\LoginController::class, 'logout'])->name('client.logout');



Route::get('/', [ClientController\HomeController::class, 'home'])->name('home');
Route::get('/chat', [ClientController\ChatController::class, 'chat'])->middleware('client')->name('chat'); 
Route::get('/chat-asked/{id}', [ClientController\ChatController::class, 'askedQuestion'])->middleware('client')->name('asked.question'); 
Route::post('/chat-post', [ClientController\ChatController::class, 'chatPost'])->middleware('client')->name('chat.post'); 
Route::delete('/delete-asked/{id}', [ClientController\ChatController::class, 'deleteAskedQuestion'])->middleware('client')->name('delete.asked.question');
Route::delete('/delete-all/{id}', [ClientController\ChatController::class, 'deleteAll'])->middleware('client')->name('delete.all.question');