<?php

use App\Models\Clearence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClearenceController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\RequestEquipment;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\EquipmentController;
use App\Http\Controllers\backend\admin\AdminController;
use App\Http\Controllers\backend\NotificationController;
use App\Http\Controllers\backend\admin\AdminAuthController;
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

//Clearence Info View for student route
Route::GET('/clear/view/{id}/{count}', [ClearenceController::class, 'studentClearenceView'])->name('clearence.view');

// CLEARENCE REQUEST FOR CRAFT INSPECTOR
Route::GET('/clear/craft', [ClearenceController::class, 'craftClearence'])->name('clearence.craft');
Route::GET('/approve/craft/{id}', [ClearenceController::class, 'craftApproval'])->name('approve.craft');

// CLEARENCE REQUEST FOR WORKSHOP SUPER
Route::GET('/clear/worksuper', [ClearenceController::class, 'workshopClearence'])->name('clearence.worksuper');
Route::GET('/approve/worksuper/{id}', [ClearenceController::class, 'workApproval'])->name('approve.worksuper');

// CLEARENCE REQUEST FOR DEPT HAED
Route::GET('/clear/depthead', [ClearenceController::class, 'deptHeadClearence'])->name('clearence.depthead');
Route::GET('/approve/depthead/{id}', [ClearenceController::class, 'deptHeadApproval'])->name('approve.depthead');

// CLEARENCE REQUEST FOR REGISTER
Route::GET('/clear/register', [ClearenceController::class, 'registerClearence'])->name('clearence.register');
Route::GET('/approve/register/{id}', [ClearenceController::class, 'registerApproval'])->name('approve.register');

// CLEARENCE REQUEST FOR PRINCIPAL
Route::GET('/clear/viceprincipal', [ClearenceController::class, 'vicePrincipalClearence'])->name('clearence.viceprincipal');
Route::GET('/approve/viceprincipal/{id}', [ClearenceController::class, 'vicePrincipalApproval'])->name('approve.viceprincipal');

// CLEARENCE REQUEST FOR PRINCIPAL
Route::GET('/clear/principal', [ClearenceController::class, 'principalClearence'])->name('clearence.principal');
Route::GET('/approve/principal/{id}', [ClearenceController::class, 'principalApproval'])->name('approve.principal');




//Admin Login & Register
Route::get('admin', [AdminAuthController::class, 'login_index'])->name('admin.login.index');
Route::post('admin', [AdminAuthController::class, 'login'])->name('admin.login');



// ADMIN PART ROUTES
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');

    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    //Admin CRUD Route
    Route::get('employee',[AdminController::class,'index'])->name('index');
    Route::get('create',[AdminController::class,'create'])->name('create');
    Route::post('store',[AdminController::class,'store'])->name('store');
});




// NOTIFICATIONS CLEAR ROUTE
Route::GET('/notification/clear', [NotificationController::class, 'notifyClear'])->name('notify.clear');
