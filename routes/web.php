<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\RequestEquipment;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\EquipmentController;
use App\Http\Controllers\backend\RequestEquipmentController;
use App\Http\Controllers\ClearenceController;
use App\Models\Clearence;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('/user', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// CATEGORY ROUTE
Route::resource('/category', CategoryController::class);




// EQUIPMENT CONTROLLER


Route::get('/trash/equipment', [EquipmentController::class, 'equipmentTrash'])->name('equipment.trash');

Route::delete('/equipment//permanent-delete/{id}', [EquipmentController::class, 'permanentDelete'])->name('equipment.per_delete');

Route::get('/restore/equipment/{id}', [EquipmentController::class, 'equipmentRestore'])->name('equipment.restore');


Route::put('/status/{id}', [EquipmentController::class, 'status'])->name('equipment.status');

Route::resource('/equipment', EquipmentController::class);


// REQUEST EQUIPMENT ROUTES
Route::POST('/request/lab', [RequestEquipmentController::class, 'onlyLab'])->name('request.lab');
Route::resource('/resquest', RequestEquipmentController::class);

// REQUEST FOR RETURNING EQUIPMENT CONFIRMATION
Route::GET('/request/confirmation/{id}', [RequestEquipmentController::class, 'returnEquipment'])->name('request.confirmation');
Route::GET('/request/confirm-request', [RequestEquipmentController::class, 'returnEquipmentRequest'])->name('request.confirm.request');
Route::GET('/request/accepted/{id}', [RequestEquipmentController::class, 'requestAccepted'])->name('request.accept');



//REQUEST FOR CLEARENCE SYSTEM
Route::GET('/clearence/{id}', [ClearenceController::class, 'getClearenceRequest'])->name('clearence.getRequest');

// CLEARENCE REQUEST FOR CRAFT INSPECTOR
Route::GET('/clear/craft', [ClearenceController::class, 'craftClearence'])->name('clearence.craft');
