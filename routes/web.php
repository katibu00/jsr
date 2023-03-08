<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollationController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\ElectionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostResultController;
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

    if(auth()->check()){
        if(auth()->user()->usertype == 'admin'){
            return redirect()->route('admin.home');
        }
        if(auth()->user()->usertype == 'agent'){
            return redirect()->route('agent.home');
        }
    };
    return view('auth.login');
});
Route::get('/home', function () {

    if(auth()->check()){
        if(auth()->user()->usertype == 'admin'){
            return redirect()->route('admin.home');
        }
        if(auth()->user()->usertype == 'agent'){
            return redirect()->route('agent.home');
        }
    };
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'loginIndex'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginStore']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});

Route::group(['middleware' => ['auth', 'agent']], function () {
    Route::get('/agent/postings', [HomeController::class, 'agent'])->name('agent.home');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/lg_coordinator/postings', [HomeController::class, 'coordinator'])->name('coordinator.home');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/ward_coordinator/postings', [HomeController::class, 'ward'])->name('ward.home');
});

Route::group(['prefix' => 'setups', 'middleware' => ['auth']], function () {
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

    Route::get('/wards/edit/index', [WardsController::class, 'editIndex'])->name('wards.edit.index');
    Route::post('/wards/edit/index', [WardsController::class, 'editStore']);

    Route::get('/polling_units/index', [PUsController::class, 'index'])->name('pus.index');
    Route::post('/polling_units/index', [PUsController::class, 'store']);
    Route::post('/polling_units/update', [PUsController::class, 'update'])->name('pus.update');
    Route::post('/polling_units/delete', [PUsController::class, 'delete'])->name('pus.delete');
    Route::post('/get-wards', [PUsController::class, 'getWards'])->name('get-wards');
    Route::post('/get-pus', [PUsController::class, 'getPUs'])->name('get-pus');
    Route::post('/get-registered', [PUsController::class, 'getRegistered'])->name('get-registered');
    Route::post('/get-warning', [PUsController::class, 'getWarning'])->name('get-warning');

    Route::get('/senatorial_zones/index', [ZoneController::class, 'index'])->name('zone.index');
    Route::post('/senatorial_zones/store', [ZoneController::class, 'store'])->name('zone.store');
    Route::post('/senatorial_zones/update', [ZoneController::class, 'update'])->name('zone.update');
    Route::post('/senatorial_zones/delete', [ZoneController::class, 'delete'])->name('zone.delete');
});


Route::group(['prefix' => 'users', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/agents/index', [UsersController::class, 'agentsIndex'])->name('users.agents.index');
    Route::post('/agents/store', [UsersController::class, 'agentsStore'])->name('users.agents.store');
    Route::post('/agents/verify', [UsersController::class, 'verify'])->name('users.agents.verify');
    Route::post('/delete', [UsersController::class, 'delete'])->name('users.delete');
    Route::post('/sms', [UsersController::class, 'sms'])->name('users.sms');
    Route::post('/agents/sort', [UsersController::class, 'sort'])->name('users.agents.sort');
    Route::post('/get-user-details', [UsersController::class, 'getDetails'])->name('get-user-details');

    Route::get('/login-logs', [UsersController::class, 'loginLogs'])->name('login.logs');
});

Route::group(['prefix' => 'communication', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/sms/index', [CommunicationController::class, 'index'])->name('communication.index');
    Route::post('/sms/send', [CommunicationController::class, 'send'])->name('communication.send');
    Route::get('/sms/balance', [CommunicationController::class, 'balance'])->name('communication.balance'); 
});

Route::group(['prefix' => 'elections', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/index', [ElectionsController::class, 'index'])->name('elections.index');
    Route::post('/store', [ElectionsController::class, 'store'])->name('elections.store');
    Route::post('/delete', [ElectionsController::class, 'delete'])->name('elections.delete');
    Route::post('/accepting', [ElectionsController::class, 'accepting'])->name('elections.accepting');
});

Route::group(['prefix' => 'report', 'middleware' => ['auth']], function () {

    Route::get('/collation/index', [CollationController::class, 'index'])->name('result.collation');
    Route::post('/collation/index', [CollationController::class, 'getResult'])->name('result.collation');

    Route::get('/pd/index', [CollationController::class, 'reportIndex'])->name('result.pdf');
    Route::post('/pd/index', [CollationController::class, 'reportGenerate']);

});
Route::group(['prefix' => 'result', 'middleware' => ['auth']], function () {
    Route::get('/post/index', [PostResultController::class, 'index'])->name('result.post');
    Route::post('/post/index', [PostResultController::class, 'store']);
    Route::post('/get-elections', [PostResultController::class, 'getElections'])->name('get-elections');

    Route::get('/post_by_ward/index', [PostResultController::class, 'indexWard'])->name('result.post.ward');
    Route::post('/post_by_ward/index', [PostResultController::class, 'storeWard']);

});