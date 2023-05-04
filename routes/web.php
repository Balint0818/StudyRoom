<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\AppointmentController;

use App\Http\Middleware\checkAdmin;

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

Route::get('/add_room_view', [AdminController::class, 'addview'])->middleware('checkAdmin');

Route::get('/manage_users', [AdminController::class, 'manage_users'])->middleware('checkAdmin');

Route::post('/upload_rooms', [AdminController::class, 'upload'])->middleware('checkAdmin');

Route::get('/upload_rooms', [HomeController::class, 'restrict']);

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/appointment', [HomeController::class, 'restrict']);

Route::get('/myappointments', [HomeController::class, 'myappointments']);

Route::get('/delete/{id}', [HomeController::class, 'delete']);

Route::get('/create_appointment', [HomeController::class, 'create_appointment']);

Route::get('/schedule', [HomeController::class, 'schedule']);

Route::get('/adminpanel', [HomeController::class, 'admin_view'])->middleware('checkAdmin');

Route::get('/giveAdmin/{id}', [AdminController::class, 'giveAdmin'])->middleware('checkAdmin');

Route::get('/removeAdmin/{id}', [AdminController::class, 'removeAdmin'])->middleware('checkAdmin');

Route::get('/update_user/{id}', [AdminController::class, 'update_user'])->middleware('checkAdmin');

Route::post('/edituser/{id}', [AdminController::class, 'edituser'])->middleware('checkAdmin');


//AppointmentController Admin Functions

Route::get('/manage_appointments', [AppointmentController::class, 'manage'])->name('manage_appointments')->middleware('checkAdmin');

Route::get('/modify_app/{id}', [AppointmentController::class, 'modify'])->middleware('checkAdmin');

Route::get('/deleteAppointment/{id}', [AppointmentController::class, 'delete'])->middleware('checkAdmin');

Route::post('/updateAppointment/{id}', [AppointmentController::class, 'update'])->middleware('checkAdmin');





