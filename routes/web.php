<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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
    return redirect('/login');
});
//AdminController
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/login', 'Index')->name('admin.login');
    Route::post('/admin/login/owner', 'Login')->name('admin.login.owner');
});

//UserController
Route::controller(UserController::class)->group(function () {
    Route::get('/user/logout', 'destroy')->name('user.logout');
    Route::get('/user/profile', 'Profile')->name('user.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    //change password
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

//TaskController
Route::controller(TaskController::class)->group(function () {
    Route::get('/task/page', 'TaskPage')->name('task.page');
    Route::post('/store/task', 'StoreTask')->name('store.task');
    Route::get('/alltask/page', 'AllTaskPage')->name('alltask.page');
    Route::get('/delete/task/{id}', 'DeleteTask')->name('delete.task');
    Route::get('/edit/task/{id}', 'EditTask')->name('edit.task');
    Route::post('/update/task', 'UpdateTask')->name('update.task');
    Route::get('/alltask/dashboard', 'AllTaskDashboard')->name('alltask.dashboard');
});

Route::get('/dashboard', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
