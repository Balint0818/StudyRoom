<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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
Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_room_view', [AdminController::class, 'addview']);

Route::get('/manage_users', [AdminController::class, 'manage_users']);

Route::post('/upload_rooms', [AdminController::class, 'upload']);

Route::get('/upload_rooms', [HomeController::class, 'restrict']);

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/appointment', [HomeController::class, 'restrict']);


Route::get('/create_appointment', [HomeController::class, 'create_appointment']);

Route::get('/schedule', [HomeController::class, 'schedule']);

Route::get('/adminpanel', [HomeController::class, 'admin_view']);

Route::get('/giveAdmin/{id}', [AdminController::class, 'giveAdmin']);

Route::get('/update_user/{id}', [AdminController::class, 'update_user']);

Route::post('/edituser/{id}', [AdminController::class, 'edituser']);

Route::get('/manage_appointments', [AdminController::class, 'manage']);

Route::get('/modify_app/{id}', [AdminController::class, 'modify']);




