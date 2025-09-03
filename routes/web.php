<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:employer|admin'])->group(function () {
        Route::get('/employer/home', [EmployerController::class, 'home'])->name('employer.home');
        Route::get('/employer/addjob', [EmployerController::class, 'addjob'])->name('employer.addjob');
        Route::post('/employer/store', [EmployerController::class, 'store'])->name('employer.store');
        Route::get('/employer/myjobs', [EmployerController::class, 'myjobs'])->name('employer.myjobs');
        Route::get('/employer/myjobs/detail/{id}', [EmployerController::class, 'jobdetail'])->name('employer.jobdetail');
        Route::get('/employer/myjobs/edit/{id}', [EmployerController::class, 'editjob'])->name('employer.editjob');
        Route::post('/employer/myjobs/{id}', [EmployerController::class, 'update'])->name('employer.update');
        Route::delete('/employer/myjobs/delete/{id}', [EmployerController::class, 'delete'])->name('employer.delete');

        Route::get('/employer/myjobs/applicants/{id}', [EmployerController::class, 'applicants'])->name('employer.applicants');
        Route::get('/employer/data/{id}', [EmployerController::class, 'getLamaransData'])->name('employer.lamaransdata');
        Route::get('/employer/myjobs/applicants/detail/{id}', [EmployerController::class, 'applicantsdetail'])->name('employer.applicantsdetail');
        Route::delete('/employer/myjobs/applicants/detail/delete/{id}', [EmployerController::class, 'lamaransdelete'])->name('employer.lamaransdelete');
        Route::put('/employer/myjobs/applicants/detail/update/{id}', [EmployerController::class, 'lamaransupdate'])->name('employer.lamaransupdate');
        Route::get('/employer/myjobs/applicants/detail/accept/{id}', [EmployerController::class, 'lamaranaccept'])->name('employer.lamaranaccept');
        Route::get('/employer/myjobs/applicants/detail/decline/{id}', [EmployerController::class, 'lamarandecline'])->name('employer.lamarandecline');
        Route::get('/myjobs/data', [JobController::class, 'employerData'])->name('employer.data');

        Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
        Route::get('/admin/employers', [AdminController::class, 'employerlist'])->name('admin.employerlist');
        Route::get('/admin/employers/data', [AdminController::class, 'getEmployersData'])->name('admin.getemployerdata');
        Route::get('/admin/lowongan', [AdminController::class, 'lowonganlist'])->name('admin.lowonganlist');
        Route::get('/admin/lowongan/data', [AdminController::class, 'getLowongansData'])->name('admin.getlowongandata');
        Route::get('/admin/jobs/detail/{id}', [AdminController::class, 'jobdetail'])->name('admin.jobdetail');
        Route::get('/admin/employer/detail/{id}', [AdminController::class, 'employerdetail'])->name('admin.employerdetail');
        Route::delete('/admin/employer/delete/{id}', [AdminController::class, 'employerdelete'])->name('admin.employerdelete');
        Route::get('/admin/employer/jobs/data/{id}', [AdminController::class, 'getemployerjobs'])->name('admin.getemployerjobs');
        Route::get('/admin/employer/jobs/{id}', [AdminController::class, 'employerjobs'])->name('admin.employerjobs');

        Route::get('/admin/jobseekers/data', [AdminController::class, 'getUserData'])->name('admin.getuserdata');
        Route::get('/admin/jobseekers', [AdminController::class, 'jobseekerlist'])->name('admin.jobseekerlist');
        Route::get('/admin/jobseekers/applications/data/{id}', [AdminController::class, 'getLamaransData'])->name('admin.lamaransdata');
        Route::get('/admin/jobseekers/applications/{id}', [AdminController::class, 'lamaranlistuser'])->name('admin.lamaranlistuser');
    });

    Route::get('/dashboard/home', [HomeController::class, 'home'])->name('dashboard.home');

    Route::get('/jobs/data', [JobController::class, 'getData'])->name('jobs.data');
    Route::get('/jobs/joblist', [JobController::class, 'joblist'])->name('jobs.joblist');
    Route::get('/jobs/detail/{id}', [JobController::class, 'detail'])->name('jobs.detail');
    Route::get('/jobs/detail/{id}/', [JobController::class, 'detail'])->name('jobs.detail');
    Route::get('/favorite/{id}', [JobController::class, 'addfavorite'])->name('jobs.addfavorite');
    Route::get('/user/favorites/data', [JobController::class, 'favoriteJobsData'])->name('favorites.data');
    Route::get('/jobs/favorites', [JobController::class, 'myfavorites'])->name('jobs.favoritejobs');
    Route::get('/jobs/favorites/delete/{id}', [JobController::class, 'deletefavorite'])->name('jobs.deletefavorite');
    Route::delete('/jobs/favorites/delete/{id}', [JobController::class, 'deletefavorite'])->name('jobs.deletefavorite');
    Route::get('/user/history/data', [JobController::class, 'historyJobsData'])->name('history.data');
    Route::delete('/jobs/history/delete/{id}', [JobController::class, 'deletelamaran'])->name('jobs.deletelamaran');
    Route::get('/jobs/history/', [JobController::class, 'history'])->name('jobs.history');


    Route::get('/lamaran/{id}/apply', [LamaranController::class, 'index'])->name('lamaran.apply');
    Route::post('/lamaran/{id}', [LamaranController::class, 'store'])->name('lamaran.store');
    Route::get('/lamaran/success', [LamaranController::class, 'success'])->name('lamaran.success');
    Route::get('/lamaran/edit/{id}', [LamaranController::class, 'editlamaran'])->name('lamaran.editlamaran');
    Route::post('/lamaran/edit/update/{id}', [LamaranController::class, 'update'])->name('lamaran.update');


    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});