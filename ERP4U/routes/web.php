<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Actl\PostalCodeController;
use App\Http\Controllers\Actl\TaxRateController;
use App\Http\Controllers\Actl\UnitMeasureController;
use App\Http\Controllers\Actl\SupplierController;


Route::get('/', function () {
    return view('welcome');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


 // Admin All Route 
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');

});

// Postal codes
Route::controller(PostalCodeController::class)->group(function(){
    Route::get('/postalCode/all','PostalCodeAll')->name('postalCode.all');
    Route::get('/postalCode/add','PostalCodeAdd')->name('postalCode.add');
    Route::post('/postalCode/store','PostalCodeStore')->name('postalCode.store');
    Route::get('/postalCode/edit/{id}','PostalCodeEdit')->name('postalCode.edit');
    Route::post('/postalCode/update}','PostalCodeUpdate')->name('postalCode.update');
    Route::get('/postalCode/delete/{id}','PostalCodeDelete')->name('postalCode.delete');
});

Route::controller(TaxRateController::class)->group(function(){
    Route::get('/taxRate/all','taxRateAll')->name('taxRate.all');
    Route::get('/taxRate/add','taxRateAdd')->name('taxRate.add');
    Route::post('/taxRate/store','taxRateStore')->name('taxRate.store');
    Route::get('/taxRate/edit/{id}','taxRateEdit')->name('taxRate.edit');
    Route::post('/taxRate/update}','taxRateUpdate')->name('taxRate.update');
    Route::get('/taxRate/delete/{id}','TaxRateDelete')->name('taxRate.delete');

});
Route::controller(UnitMeasureController::class)->group(function(){
    Route::get('/unitMeasure/all','unitMeasureAll')->name('unitMeasure.all');
    Route::get('/unitMeasure/add','unitMeasureAdd')->name('unitMeasure.add');
    Route::post('/unitMeasure/store','unitMeasureStore')->name('unitMeasure.store');
    Route::get('/unitMeasure/edit/{id}','unitMeasureEdit')->name('unitMeasure.edit');
    Route::post('/unitMeasure/update}','unitMeasureUpdate')->name('unitMeasure.update');
    Route::get('/unitMeasure/delete/{id}','unitMeasureDelete')->name('unitMeasure.delete');
});

Route::controller(SupplierController::class)->group(function(){
    Route::get('/supplier/all','supplierAll')->name('supplier.all');
    Route::get('/supplier/add','supplierAdd')->name('supplier.add');
    Route::post('/supplier/store','supplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}','supplierEdit')->name('supplier.edit');
    Route::post('/supplier/update}','supplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}','supplierDelete')->name('supplier.delete');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });