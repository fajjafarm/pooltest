<?php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PoolTestsController;
use App\Http\Controllers\PoolTestController;
use App\Http\Controllers\EquipmentCheckController;
use App\Http\Controllers\TemperatureCheckController;
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

//Route::resource('temperatureChecks', TemperatureCheckController::class);
Route::get('/temperatureChecks', [TemperatureCheckController::class, 'latest'])->name('temperatureChecks.index');
Route::post('/temperatureChecks', [TemperatureCheckController::class, 'latest'])->name('temperatureChecks.index');

Route::get('/pooltest/create', [PoolTestController::class, 'create'])->name('pooltest.create');
Route::post('/pooltest', [PoolTestController::class, 'store'])->name('pooltest.store');

Route::get('/dashboards/pooltests', [PoolTestsController::class, 'pooltests'])->name('pooltests');

Route::get('/equipment-check', [EquipmentCheckController::class, 'index'])->name('equipment-check');
Route::post('/equipment-check', [EquipmentCheckController::class, 'store'])->name('equipment-check');

require __DIR__ . '/auth.php';

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn()=>view('dashboards.index'))->name('home');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});

