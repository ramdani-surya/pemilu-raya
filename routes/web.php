<?php

use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\Admin\MainController as AdminController;
use App\Http\Controllers\Admin\VoterController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\StudyProgramController;
use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\CandidateTypeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
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

Route::prefix('login')->middleware(['guest:voter', 'comingSoon'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware(['auth:voter', 'comingSoon'])->group(function () {
    Route::middleware('hasVoted')->group(function () {
        Route::get('/', [Controller::class, 'index'])->name('index');
        Route::get('/elect-candidate/{candidate}', [CandidateController::class, 'elect'])->name('elect_candidate');
    });

    Route::get('/has-voted', [Controller::class, 'hasVoted'])->name('has_voted');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/coming-soon', [Controller::class, 'comingSoon'])->name('coming_soon');
Route::get('/closed', [Controller::class, 'closed'])->name('closed');

# ADMIN
Route::prefix('login')->middleware('guest')->group(function () {
    Route::get('/admin', [LoginController::class, 'index'])->name('admin.login');
    Route::post('/admin', [LoginController::class, 'login'])->name('admin.post');
});






Route::group(['middleware' => ['loggedIn', 'web']], function () {
   
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/show/{type}', [AdminController::class, 'show'])->name('admin.dashboard.show');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::resource('users', UserController::class)->except('create');
        Route::get('/user/clear', [UserController::class, 'clear'])->name('users.clear');
        Route::post('/user/update-password/{user}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
        Route::post('/checkUsername', [UserController::class, 'checkUsername'])->name('user.checkUsername');
        Route::post('/checkEmail', [UserController::class, 'checkEmail'])->name('user.checkEmail');

        Route::resource('elections', ElectionController::class)->except('create', 'edit');
        Route::post('election/check-election-name', [ElectionController::class, 'checkElectionName'])->name('checkElectionName');
        Route::post('election/check-election-period', [ElectionController::class, 'checkElectionPeriod'])->name('checkElectionPeriod');
        Route::prefix('election')->group(function () {
            Route::get('/clear', [ElectionController::class, 'clear'])->name('elections.clear');
            Route::get('/{election}/running/{runningStatus?}', [ElectionController::class, 'running'])->name('elections.running');
            Route::get('/{election}/send-token', [ElectionController::class, 'sendToken'])->name('elections.send_token');
            Route::get('/{election}/archive', [ElectionController::class, 'archive'])->name('elections.archive');
            Route::get('/{election}/reset-voting', [ElectionController::class, 'resetVoting'])->name('elections.reset_voting');
        });

        Route::resource('faculties', FacultyController::class);
        Route::post('faculty/check-faculty-name', [FacultyController::class, 'checkFacultyName'])->name('checkFacultyName');
        Route::get('faculty/clear', [FacultyController::class, 'clear'])->name('faculties.clear');
        Route::resource('study-programs', StudyProgramController::class);
        Route::post('study-program/check-study-program-name', [StudyProgramController::class, 'checkStudyProgramName'])->name('checkStudyProgramName');
        Route::get('study-program/clear', [StudyProgramController::class, 'clear'])->name('study-programs.clear');

        Route::middleware('checkActiveElection')->group(function () {
            Route::resource('candidates', CandidateController::class);
            Route::get('candidates/create-in/{slug}', [CandidateController::class, 'createIn'])->name('candidates.createIn');
            Route::get('candidates/edit/{id}/{candidateType}', [CandidateController::class, 'edit'])->name('candidates.editIn');
            Route::get('get-study-program/{id}', [CandidateController::class, 'getStudyProgram']);
            Route::get('get-candidate-number/{id}', [CandidateController::class, 'getCandidateNumber']);
            Route::get('/candidate/clear', [CandidateController::class, 'clear'])->name('candidates.clear');
            Route::resource('candidate_types', CandidateTypeController::class);
            Route::post('candidate_type/check-candidate-type', [CandidateTypeController::class, 'checkCandidateType'])->name('checkCandidateType');
            Route::get('/candidate_type/clear', [CandidateTypeController::class, 'clear'])->name('candidate_types.clear');

            Route::resource('voters', VoterController::class)->except('create', 'edit', 'show');
            Route::post('voter/check-dpt-nim', [VoterController::class, 'checkDptNim'])->name('checkDptNim');
            Route::post('voter/check-dpt-email', [VoterController::class, 'checkDptEmail'])->name('checkDptEmail');
            Route::prefix('voters')->group(function () {
                Route::get('/clear', [VoterController::class, 'clear'])->name('voters.clear');
                Route::post('/import', [VoterController::class, 'import'])->name('voters.import');
                Route::get('/download-format', [VoterController::class, 'downloadFormat'])->name('voters.download_format');
                Route::get('/{voter}/reset-token/{sendEmail}', [VoterController::class, 'resetToken'])->name('voters.reset_token');
            });
        });
    });
});

