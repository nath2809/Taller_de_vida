<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AddUserToActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Exports\ActivityExport;
use App\Exports\UsersExport;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// RUTAS PARA ENVIAR EL EMAIL PARA RESETEAR PASSWORD
Route::get('/forgot_password', [ForgotPasswordController::class, 'showLinkRequestForm']);
Route::post('/forgot_password', [ForgotPasswordController::class, 'sendResetLinkEmail']);

Route::get('/password_reset_success', function () {
    return view('auth.resetPassword.SendEmailSuccess');
});

// RUTAS PARA ACTUALIZAR LA CONTRASENA
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm']);
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);

// RUTAS PARA EL REGISTRO DEL USER
Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'register']);

// RUTAS PARA EL LOGIN Y LOGOUT DE LA APLICACION
Route::get('/', [AuthController::class, 'show']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['checkuserstatus'])->group(function () {

    // RUTAS PARA CARGAR EL HOME DE LA APLICACION
    Route::get('/home', [HomeController::class, 'index']);


    Route::middleware(['auth','role:Administrador'])->group(function () {
        // RUTAS PARA EL CRUD DEL USER
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/user_create', [UserController::class, 'store_show']);
        Route::post('/user_create', [UserController::class, 'store']);
        Route::get('/user_edit/{id}', [UserController::class, 'edit']);
        Route::patch('/user_edit/{id}', [UserController::class, 'update']);
        Route::get('/user/{id}', [UserController::class, 'view']);
    });

    // RUTAS PARA LAS ACTIVIDADES
    Route::get('/activities', [ActivityController::class, 'index']);
    Route::get('/activity/{id}', [ActivityController::class, 'view'])->name('activity.view');
    Route::get('/create_activity', [ActivityController::class, 'create']);
    Route::post('/create_activity', [RegisterController::class, 'registerActivity']);
    Route::get('/activity_edit/{id}', [ActivityController::class, 'edit']);
    Route::patch('/activity_edit/{id}', [ActivityController::class, 'update']);

    // RUTAS PARA EL PROFILE
    Route::get('/profile{id}', [ProfileController::class, 'index']);
    Route::get('/edit_profile/{id}', [ProfileController::class, 'edit']);
    Route::patch('/edit_profile/{id}', [ProfileController::class, 'update']);

    Route::post('/activities/{activityId}/participants', 'App\Http\Controllers\ActivityController@addParticipants')->name('activities.addParticipants');
    Route::delete('activities/{activityId}/participants/{userId}', 'App\Http\Controllers\ActivityController@removeParticipant')->name('activity.removeParticipant');

});

Route::get('/download_activity', [ActivityController::class, 'exportActivity']);
Route::get('/download_user', [UserController::class,'exportUser']);














