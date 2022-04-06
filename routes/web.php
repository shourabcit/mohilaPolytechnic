<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\RequestEquipment;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\EquipmentController;
use App\Http\Controllers\backend\RequestEquipmentController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('/user', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// CATEGORY ROUTE
Route::resource('/category', CategoryController::class);




// EQUIPMENT CONTROLLER
Route::delete('/equipment/delete/{id}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');

Route::get('/trash/equipment', [EquipmentController::class, 'equipmentTrash'])->name('equipment.trash');

Route::delete('/equipment//permanent-delete/{id}', [EquipmentController::class, 'permanentDelete'])->name('equipment.per_delete');

Route::get('/restore/equipment/{id}', [EquipmentController::class, 'equipmentRestore'])->name('equipment.restore');


Route::put('/status/{id}', [EquipmentController::class, 'status'])->name('equipment.status');

Route::resource('/equipment', EquipmentController::class);


// REQUEST EQUIPMENT ROUTES
Route::POST('/request/lab', [RequestEquipmentController::class, 'onlyLab'])->name('request.lab');
Route::resource('/resquest', RequestEquipmentController::class);
