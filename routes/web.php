<?php

use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\Admin\MainController as AdminController;
use App\Http\Controllers\Admin\VoterController;
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
    return redirect(route('admin.dashboard'));
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('elections', ElectionController::class)->except('create', 'edit');
    Route::get('/elections/{election}/{archived}', [ElectionController::class, 'archive'])->name('elections.archive');

    Route::resource('voters', VoterController::class)->except('create', 'edit', 'show');
    Route::get('/voters/clear', [VoterController::class, 'clear'])->name('voters.clear');
});
