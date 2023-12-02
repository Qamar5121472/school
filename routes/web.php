<?php

use App\Http\Controllers\Admin\AddmissionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admission')->group(function(){
        Route::controller(AddmissionController::class)->group(function(){
            Route::get('admission-list','index')->name('admissionList');
            Route::get('new','createAddmission')->name('newAddmission');
            Route::POST('register-student','create')->name('registerStudent');
            Route::get('detail/{id}','detail')->name('admissionDetail');

            Route::get('edit-admission-info/{id}','update')->name('editAddmissionInfo');

            Route::POST('update-student-information','updateInfo')->name('updateAddmissionInfo');
            Route::DELETE('delete-information/{id}','delete')->name('deleteAddmissionInfo');


        });
    });
    Route::prefix('setting')->group(function(){
        Route::controller(SettingController::class)->group(function(){
            Route::get('about-us','about')->name('aboutUs');
            Route::POST('save-about-us','createAboutUs')->name('aboutUsSaveData');

            Route::get('admin-settings','setting')->name('setting');
            Route::POST('admin-save-setting','saveSetting')->name('saveSettingChanges');
        });
    });



});

require __DIR__.'/auth.php';
