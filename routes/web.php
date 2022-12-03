<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Setup\LGAController;
use App\Http\Controllers\Setup\PPController;
use App\Http\Controllers\Setup\PUsController;
use App\Http\Controllers\Setup\WardsController;
use App\Http\Controllers\Setup\ZoneController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin');
});

Route::get('/login', [AuthController::class, 'loginIndex'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginStore']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerIndex'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerStore']);


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});
Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/user/home', [HomeController::class, 'admin'])->name('user.home');
});

Route::group(['prefix' => 'setups', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/lga/index', [LGAController::class, 'index'])->name('lga.index');
    Route::post('/lga/index', [LGAController::class, 'store']);
    Route::post('/lga/update', [LGAController::class, 'update'])->name('lga.update');
    Route::post('/lga/delete', [LGAController::class, 'delete'])->name('lga.delete');

    Route::get('/political_party/index', [PPController::class, 'index'])->name('pp.index');
    Route::post('/political_party/index', [PPController::class, 'store']);
    Route::post('/political_party/update', [PPController::class, 'update'])->name('pp.update');
    Route::post('/political_party/delete', [PPController::class, 'delete'])->name('pp.delete');

    Route::get('/wards/index', [WardsController::class, 'index'])->name('wards.index');
    Route::post('/wards/index', [WardsController::class, 'store']);
    Route::post('/wards/update', [WardsController::class, 'update'])->name('wards.update');
    Route::post('/wards/delete', [WardsController::class, 'delete'])->name('wards.delete');

    Route::get('/polling_units/index', [PUsController::class, 'index'])->name('pus.index');
    Route::post('/polling_units/index', [PUsController::class, 'store']);
    Route::post('/polling_units/update', [PUsController::class, 'update'])->name('pus.update');
    Route::post('/polling_units/delete', [PUsController::class, 'delete'])->name('pus.delete');
    Route::post('/get-wards', [PUsController::class, 'getWards'])->name('get-wards');
    Route::post('/get-pus', [PUsController::class, 'getPUs'])->name('get-pus');

    Route::get('/senatorial_zones/index', [ZoneController::class, 'index'])->name('zone.index');
    Route::post('/senatorial_zones/store', [ZoneController::class, 'store'])->name('zone.store');
    Route::post('/senatorial_zones/update', [ZoneController::class, 'update'])->name('zone.update');
    Route::post('/senatorial_zones/delete', [ZoneController::class, 'delete'])->name('zone.delete');
});


Route::group(['prefix' => 'users', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/agents/index', [UsersController::class, 'agentsIndex'])->name('users.agents.index');
});