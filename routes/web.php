<?php
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PoolTestsController;
use App\Http\Controllers\EquipmentCheckController;
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

