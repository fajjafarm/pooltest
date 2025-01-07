<?php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\PoolTestResultsController;
use App\Http\Controllers\PoolTestController;
use App\Http\Controllers\EquipmentCheckController;
use App\Http\Controllers\WaterBalanceTestController;
use App\Http\Controllers\ActionLogController;
use App\Http\Controllers\BackwashController;
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





Route::post('/water_balance_checks/waterBalanceTestForm', [WaterBalanceTestController::class, 'submitWaterTest'])->name('water_balance_checks.waterBalanceTestForm');

Route::post('/equipment-check', [EquipmentCheckController::class, 'store'])->name('equipment-check');
Route::get('/equipment-check', [EquipmentCheckController::class, 'index'])->name('equipment-check');

Route::get('/actionlog/{testId}', [ActionLogController::class, 'create'])->name('actionlog.create');
Route::post('/actionlog', [ActionLogController::class, 'store'])->name('actionlog.store');

Route::get('/backwashes/view', [BackwashController::class, 'index'])->name('backwashes.index');
Route::get('/backwashes/view/{backwashId}', [BackwashController::class, 'index'])->name('backwashes.index');
Route::get('/backwashes', [BackwashController::class, 'create'])->name('backwashes.create');
Route::post('/backwashes', [BackwashController::class, 'store'])->name('backwashes.store');

Route::get('/pooltest', [PoolTestController::class, 'create'])->name('pooltest.create');
Route::post('/pooltest', [PoolTestController::class, 'store'])->name('pooltest.store');



Route::get('/dashboards/pooltests', [PoolTestController::class, 'pooltests'])->name('pooltests');




require __DIR__ . '/auth.php';

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn()=>view('dashboards.index'))->name('home');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});

