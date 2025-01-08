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
use App\Http\Controllers\PoolController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WaterMeterReadingController;
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
//super admin access only
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create/', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

Route::resource('water-meter-readings', WaterMeterReadingController::class);

Route::get('/pools/create/{clientID}', [PoolController::class, 'create'])->name('pools.create');
Route::post('/pools', [PoolController::class, 'store'])->name('pools.store');

//regularuser access but only if they are associated with the company
Route::post('/water_balance_checks/waterBalanceTestForm', [WaterBalanceTestController::class, 'submitWaterTest'])->name('water_balance_checks.waterBalanceTestForm');

Route::post('/equipment-check', [EquipmentCheckController::class, 'store'])->name('equipment-check');
Route::get('/equipment-check', [EquipmentCheckController::class, 'index'])->name('equipment-check');

Route::get('/actionlog/{testId}', [ActionLogController::class, 'create'])->name('actionlog.create');
Route::post('/actionlog', [ActionLogController::class, 'store'])->name('actionlog.store');

//Route::get('/backwashes/view', [BackwashController::class, 'index'])->name('backwashes.index');
Route::get('/backwashes/view/{poolID}', [BackwashController::class, 'index'])->name('backwashes.index');
Route::get('/backwashes/create/{poolID}', [BackwashController::class, 'create'])->name('backwashes.create');
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

