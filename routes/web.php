<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
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
    return view('home');
});
Route::get('/paginas/hotel/servicios', function () {
    return view('/paginas/hotel/servicios');
})->name('servicios');

Route::get('/paginas/hotel/suite', function () {
    return view('/paginas/hotel/suite');
})->name('suite');

Route::get('/paginas/hotel/gransuite', function () {
    return view('/paginas/hotel/gransuite');
})->name('gransuite');

Route::get('/paginas/hotel/familiar', function () {
    return view('/paginas/hotel/familiar');
})->name('familiar');

Route::resource('comments', CommentsController::class)->names('comments');

Route::post('/layouts/nav', [AuthController::class, 'login'])->name('plogin');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/pregister', [AuthController::class, 'register'])->name('pregister');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('auth/google',[AuthController::class, 'redirectToGoogle'])->name('login-google');
Route::get('google-callback',[AuthController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class)->names('users');
    Route::resource('clients', ClientController::class)->names('clients');
    Route::resource('staff', StaffController::class)->names('staff');
    Route::resource('reservation', ReservationController::class)->names('reservation');
    Route::resource('payments', PaymentController::class)->names('payments');
    
    Route::resource('admins', AdminController::class)->names('admins');
    Route::resource('payments', PaymentController::class)->names('payments');
    
    Route::get('/pdf/{payment}', [PDFController::class, 'pdf'])->name('descargaPDF');
    Route::get('/manualUsuario', [PDFController::class, 'manualUsuario'])->name('descargarManual');
    
    Route::post('/staff/assign/{staff}', [StaffController::class, 'horarioAssignation'])->name('horarioAssign');
    Route::post('/staff/unassign/{staff}', [StaffController::class, 'horarioAssignation'])->name('horarioUnassign');
    Route::get('/paginas/staff/empleados', function(){
        return view('/paginas/staff/empleados');
    })->name('mostrarEmpleados');
    Route::post('/staff/empleados/{staff}', [StaffController::class, 'mostrarEmpleados'])->name('empleados');
    Route::post('/staff/solicitud/{staff}', [StaffController::class, 'solicitud'])->name('solicitud');
    Route::post('/staff/cambiar/{staff}', [StaffController::class, 'horarioChange'])->name('hacerChange');
    Route::post('/staff/denegar/{staff}', [StaffController::class, 'horarioChange'])->name('denegarChange');
    Route::post('/staff/marcar/{staff}', [StaffController::class, 'marcar'])->name('marcar');
    Route::post('/staff/marcarDenegar/{staff}', [StaffController::class, 'marcar'])->name('marcarDenegar');
    Route::post('/staff/marcarSalida/{staff}', [StaffController::class, 'marcar'])->name('marcarSalida');
    Route::post('/staff/habassign/{staff}', [StaffController::class, 'habitacionAssignation'])->name('habAssign');
    Route::post('/staff/habunassign/{staff}', [StaffController::class, 'habitacionAssignation'])->name('habUnassign');
    
    Route::post('/reservation/quitarRoom/{reservation}', [ReservationController::class, 'quitarRoom'])->name('quitarRoom');
    Route::put('/reservation/{reservation}/edit', [ReservationController::class, 'update'])->name('asignarCliente');
});






