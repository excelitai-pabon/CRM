<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Models\Admin;












Route::get('/', function () {
    return view('signin_pages.client_login');
})->name('user.login')->middleware(['guest:web','guest:admin','guest:employee','guest:super_admin']);


/***** Route with middleware */


Route::prefix('admin')->name('admin.')->group(function()
{
    $limiter = config('fortify.limiters.login');
    
    Route::get('/login', function () {
        return view('signin_pages.admin_login');
    })->middleware(['guest:web','guest:admin','guest:employee','guest:super_admin'])->name('login');
    

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:admin',
            $limiter ? 'throttle:'.$limiter : null,
        ]))->name('check');

        Route::view('/dashboard','dashboard.dashboard')->middleware('auth:admin')->name('dashboard');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        // =====================user route ======================
        Route::get('/all-user',[UserController::class,'index'])->name('all-user');
});


/***** Super admin Route with middleware */


Route::prefix('super-admin')->name('super_admin.')->group(function()
{
    $limiter = config('fortify.limiters.login');
    
    Route::get('/login', function () {
        return view('signin_pages.super_admin_login');
    })->middleware(['guest:web','guest:admin','guest:super_admin','guest:employee'])->name('login');
    

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:super_admin',
            $limiter ? 'throttle:'.$limiter : null,
        ]))->name('check');

        Route::view('/dashboard','dashboard.super-admin-dashboard')->middleware('auth:super_admin')->name('dashboard');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        // =====================user route ======================
        Route::get('/all-user',[UserController::class,'index'])->name('all-user');
});



   

/***** Employee Route with middleware */


Route::prefix('employee')->name('employee.')->group(function()
{
    $limiter = config('fortify.limiters.login');
    
    Route::get('/login', function () {
        return view('signin_pages.employee_login');
    })->middleware(['guest:web','guest:admin','guest:super_admin','guest:employee'])->name('login');
    

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:employee',
            $limiter ? 'throttle:'.$limiter : null,
        ]))->name('check');

        Route::view('/dashboard','dashboard.employee-dashboard')->middleware('auth:employee')->name('dashboard');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        // =====================user route ======================
        Route::get('/all-user',[UserController::class,'index'])->name('all-user');
});








/***** Route with middleware */

















Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/view', function () {
    return view('admin.index');
});
Route::get('/views', function () {
    return view('projects.add_project');
});
Route::get('/project/views', function () {
    return view('projects.view_project');
});
Route::get('/project/all/views', function () {
    return view('projects.all_project');
});
Route::get('/clients', function () {
    return view('ourclients.clients');
});



