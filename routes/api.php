<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController as AdminController;
use App\Http\Controllers\Admin\VoterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('admin/dashboard', [AdminController::class, 'dashboardApi'])->name('dashboard_api');

Route::get('admin/dashboard/bem', [AdminController::class, 'bemFilterApi'])->name('bem_filter_api');

Route::get('admin/dashboard/bpm', [AdminController::class, 'bpmFilterApi'])->name('bpm_filter_api');

Route::get('voters', [VoterController::class, 'indexApi'])->name('api-voter.index');
Route::post('voters/send-email', [VoterController::class, 'sendEmailApi'])->name('api-voter.send-email');
