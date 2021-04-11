<?php

use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\Admin\MainController as AdminController;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
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
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('elections', ElectionController::class)->except('create', 'edit');
    Route::get('/elections/{election}/{archived}', [ElectionController::class, 'archive'])->name('elections.archive');

    Route::resource('users', UserController::class)->except('create', 'edit');
    Route::get('/clearAllUser', [UserController::class, 'clearAll'])->name('users.clearAll');

    Route::resource('candidates', CandidateController::class);
    Route::get('/candidates/{candidate}/{archived}', [CandidateController::class, 'archive'])->name('candidates.archive');
    Route::get('/clearAll', [CandidateController::class, 'clearAll'])->name('candidates.clearAll');
    
    Route::resource('voters', VoterController::class)->except('create', 'edit', 'show');
    Route::prefix('voters')->group(function () {
        Route::get('/clear', [VoterController::class, 'clear'])->name('voters.clear');
        Route::post('/import', [VoterController::class, 'import'])->name('voters.import');
        Route::get('/download-format', [VoterController::class, 'downloadFormat'])->name('voters.download_format');
    });
});
