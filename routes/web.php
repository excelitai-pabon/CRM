<?php

use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasicAmountController;
use App\Http\Controllers\BasicAmountUpdateController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\DueController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TableController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Models\Admin;
use GuzzleHttp\Psr7\Request;

Route::get('/', function () {
    return view('signin_pages.client_login');
})->name('user.login')->middleware(['guest:web','guest:admin','guest:employee','guest:super_admin']);

Route::get('/profile',[UserController::class,'userProfile'])->name('user.profile');


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

        Route::get('/dashboard',[DashboardController::class,'adminDashboard'])->middleware('auth:admin')->name('dashboard');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        // =====================user route ======================
        Route::get('/all-user',[UserController::class,'index'])->name('all_user');
        Route::get('/add-user',[UserController::class,'create'])->name('add_user');
        Route::post('/store-user',[UserController::class,'store'])->name('user.store');
        Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('user.edit');
        Route::post('/update-user/{user}',[UserController::class,'update'])->name('user.update');
        Route::delete('/delete-user/{user}',[UserController::class,'destroy'])->name('user.delete');
        Route::get('/user-profile/{id}',[UserController::class,'profile'])->name('user.profile');


        //======================= Send Mail ==================
        Route::get('/email/{id}/{subject}', [UserController::class,'createMail'])->name('user.email');
        Route::post('/email', [UserController::class,'sendMail'])->name('user.send.email');



    //request





        //Basic
         Route::get('/basic', [BasicAmountController::class, 'basic'])->middleware('auth:admin')->name('basicAmount');

        Route::get('/basic/showingData', [BasicAmountController::class, 'basicShowDataUpdate'])->name('basic_amount.update.search')->middleware('auth:admin');

        Route::post('/basic/update/{id}', [BasicAmountUpdateController::class, 'basicUpdateRequest'])->middleware('auth:admin');

        Route::get('/add-basic-amount', [BasicAmountController::class, 'addBasicAmountSearch'])->middleware('auth:admin')->name('basic_amount.add');
        Route::get('/add-basic-create', [BasicAmountController::class, 'createBasicAmount'])->middleware('auth:admin')->name('basic_amount.create');
        Route::post('/add-basic-store/{user}', [BasicAmountController::class, 'basicAmountStore'])->middleware('auth:admin')->name('basic_amount.store');



        //** installment Routes */
        Route::get('/installment',[InstallmentController::class,'getFileNo'])->middleware('auth:admin')->name('installments');
        Route::post('/installment/find',[InstallmentController::class,'findFile'])->middleware('auth:admin')->name('installments.find');
        Route::get('/installment/all/{user}',[InstallmentController::class,'allInstallment'])->middleware('auth:admin')->name('installments.all');
        Route::get('/installment/edit/{id}',[InstallmentController::class,'editInstallment'])->middleware('auth:admin')->name('installments.edit');
        Route::post('/installment/edit/store/{id}',[InstallmentController::class,'storeEditInstallment'])->middleware('auth:admin')->name('installments.edit.store');
        Route::get('/installment/create/{user}/{installment_no}/{payment}',[InstallmentController::class,'createNewInstallment'])->middleware('auth:admin')->name('installments.create');
        Route::post('/installment/create/store/{user}/{installment_no}/{payment}',[InstallmentController::class,'storeNewInstallment'])->middleware('auth:admin')->name('installments.create.store');

        Route::get('/all-installment',[InstallmentController::class,'getFileNo'])->middleware('auth:admin')->name('all-installments');
        // ==================== Due Route ====================
        Route::get('/today-due',[DueController::class,'todayAllUserDue'])->name('all.user.due');

        //================== Report Route ====================
        Route::get('/daily-report',[ReportController::class,'dailyReport'])->name('daily_report');
        Route::get('/mothly-report',[ReportController::class,'monthlyReport'])->name('monthly_report');
        Route::get('/yearly-report',[ReportController::class,'yearlyReport'])->name('yearly_report');
        Route::get('/custom-report',[ReportController::class,'searchReport'])->name('search_report');

        // pdf
        Route::get('/daily-report/pdf',[ReportController::class,'pdfDailyReport'])->name('pdf.daily_report');


});





/***** Super admin Route with middleware */


Route::prefix('super-admin')->name('super_admin.')->group(function()
{
    $limiter = config('fortify.limiters.login');

    Route::get('/login', function () {
        return view('signin_pages.super_admin_login');
    })->middleware(['guest:web','guest:admin','guest:super_admin','guest:employee'])->name('login');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:super_admin',
            $limiter ? 'throttle:'.$limiter : null,
        ]))->name('check');

        Route::get('/dashboard',[DashboardController::class,'superAdminDashboard'])->middleware('auth:super_admin')->name('dashboard');

    //** installment Routes */
    Route::get('/installment',[InstallmentController::class,'getFileNo'])->middleware('auth:super_admin')->name('installments');
    Route::post('/installment/find',[InstallmentController::class,'findFile'])->middleware('auth:super_admin')->name('installments.find');
    Route::get('/installment/all/{user}',[InstallmentController::class,'allInstallment'])->middleware('auth:super_admin')->name('installments.all');
    Route::get('/installment/edit/{id}',[InstallmentController::class,'editInstallment'])->middleware('auth:super_admin')->name('installments.edit');
    Route::post('/installment/edit/store/{id}',[InstallmentController::class,'storeEditInstallment'])->middleware('auth:super_admin')->name('installments.edit.store');
    Route::get('/installment/create/{user}/{installment_no}/{payment}',[InstallmentController::class,'createNewInstallment'])->middleware('auth:super_admin')->name('installments.create');
    Route::post('/installment/create/store/{user}/{installment_no}/{payment}',[InstallmentController::class,'storeNewInstallment'])->middleware('auth:super_admin')->name('installments.create.store');
    Route::post('/multi-installment/create/store/{user}',[InstallmentController::class,'storeNewMultiInstallment'])->middleware('auth:super_admin')->name('multi.installments.create.store');

    //Basic amounts
    Route::get('/basic', [BasicAmountController::class, 'basic'])->middleware('auth:super_admin')->name('basicAmount');

    Route::get('/add-basic-amount', [BasicAmountController::class, 'addBasicAmountSearch'])->middleware('auth:super_admin')->name('basic_amount.add');
    Route::get('/add-basic-create', [BasicAmountController::class, 'createBasicAmount'])->middleware('auth:super_admin')->name('basic_amount.create');
    Route::post('/add-basic-store/{user}', [BasicAmountController::class, 'basicAmountStore'])
    ->middleware('auth:super_admin')->name('basic_amount.store');


    ///power of atorney routes
    Route::get('/powerOfAtorney',[PermissionController::class, 'powerOfAtorney'])->middleware('auth:super_admin')->name('powerOfAtorney');
    Route::post('/powerOfAtorney/store',[PermissionController::class, 'powerOfAtorneyStore'])->middleware('auth:super_admin')->name('powerOfAtorney.store');
    Route::get('/powerOfAtorney/delete/{id}',[PermissionController::class, 'powerOfAtorneyDelete'])->middleware('auth:super_admin')->name('powerOfAtorney.delete');


    Route::post('/basic/create/{id}', [BasicAmountController::class, 'basicCreate'])->middleware('auth:super_admin');
    // Route::post('/basic/update/{id}', [BasicAmountController::class, 'basicUpdate'])->name('basic_amount.update')->middleware('auth:super_admin');
    Route::get('/basic/showingData', [BasicAmountController::class, 'basicShowDataUpdate'])->name('basic_amount.update.search')->middleware('auth:super_admin');
    Route::get('/basic/store/{id}', [BasicAmountController::class, 'basicUpdate'])->middleware('auth:super_admin')->name('basic.approve.store');
    //basic request

    Route::post('/basic/update/{id}', [BasicAmountUpdateController::class, 'basicUpdateRequest'])->middleware('auth:super_admin');



    Route::get('/show/basicrequest',   [BasicAmountUpdateController::class,   'show_request'])->name('show.request')->middleware('auth:super_admin');
    Route::get('/destroy/request/{id}', [BasicAmountUpdateController::class, 'destroy_request'])->name('basic.destroy')->middleware('auth:super_admin');

    // =====================user route ======================
        Route::get('/all-user',[UserController::class,'index'])->name('all_user');
        Route::get('/add-user',[UserController::class,'create'])->name('add_user');
        Route::post('/store-user',[UserController::class,'store'])->name('user.store');
        Route::get('/edit-user/{user}',[UserController::class,'edit'])->name('user.edit');
        Route::post('/update-user/{user}',[UserController::class,'update'])->name('user.update');
        Route::delete('/delete-user/{user}',[UserController::class,'destroy'])->name('user.delete');
        Route::get('/user-profile/{id}',[UserController::class,'profile'])->name('user.profile');


        // ==================== Due Route ====================
        Route::get('/today-due',[DueController::class,'todayAllUserDue'])->name('all.user.due');


        //===================== CRM Route ====================

        Route::get('/add-crm',[CrmController::class,'addCrm'])->name('add.crm');
        Route::post('/store-crm',[CrmController::class,'storeCrm'])->name('store.crm');

        Route::get('/all-crm',[CrmController::class,'allCrm'])->name('all.crm');
        Route::post('/delete-crm',[CrmController::class,'deleteCrm'])->name('crm.delete');
        Route::get('/edit-crm/{id}',[CrmController::class,'editCrm'])->name('crm.edit');
        Route::post('/update-crm/{id}',[CrmController::class,'updateCrm'])->name('crm.update');

        Route::get('/add-view-employee/{crm_id}',[CrmController::class,'addCrmEmployee'])->name('crm.add.employee');

        Route::post('/store-admin/{crm_id}',[CrmController::class,'storeCrmAdmin'])->name('crm.store.admin');
        Route::get('/edit-admin/{id}',[CrmController::class,'editCrmAdmin'])->name('crm.edit.admin');
        Route::post('/details-update-admin/{id}',[CrmController::class,'detailsUpdateCrmAdmin'])->name('crm.details.update.admin');
        Route::post('/password-update-admin/{id}',[CrmController::class,'passwordUpdateCrmAdmin'])->name('crm.password.update.admin');
        Route::post('/delete-admin',[CrmController::class,'deleteCrmAdmin'])->name('crm.delete.admin');

        Route::post('/store-employee/{crm_id}',[CrmController::class,'storeCrmEmployee'])->name('crm.store.employee');
        Route::post('/delete-employee',[CrmController::class,'deleteCrmEmployee'])->name('crm.delete.employee');
        Route::get('/edit-employee/{id}',[CrmController::class,'editCrmemployee'])->name('crm.edit.employee');
        Route::post('/details-update-employee/{id}',[CrmController::class,'detailsUpdateCrmEmployee'])->name('crm.details.update.employee');
        Route::post('/password-update-employee/{id}',[CrmController::class,'passwordUpdateCrmEmployee'])->name('crm.password.update.employee');


    //pdf
    Route::get('/member/{id}/viewpdf',[PdfController::class,'viewPDF'])->middleware('auth:super_admin');
    Route::get('/member/pdf/{id}',[PdfController::class,'pdfDownload'])->middleware('auth:super_admin');



    //excel
    Route::get('/export-excel/{id}',[ExcelController::class,'exportExcel'])->middleware('auth:super_admin')->name('download.excel');
    Route::get('/export-excel/installment/{id}',[ExcelController::class,'exportExcel'])->middleware('auth:super_admin');



    Route::get('/tables/index/{id}',[TableController::class,'basic'])->middleware('auth:super_admin');
    Route::get('/basic/showingtable',[TableController::class,'basicTable'])->middleware('auth:super_admin')->name('tableshow');
    Route::get('/basic/searchtable',[TableController::class,'basicSearch'])->middleware('auth:super_admin');

     //================== Report Route ====================
     Route::get('/daily-report',[ReportController::class,'dailyReport'])->name('daily_report');
     Route::get('/mothly-report',[ReportController::class,'monthlyReport'])->name('monthly_report');
     Route::get('/yearly-report',[ReportController::class,'yearlyReport'])->name('yearly_report');
     Route::get('/custom-report',[ReportController::class,'searchReport'])->name('search_report');

     Route::get('/email/{id}/{subject}', [UserController::class,'createMail'])->name('user.email');
     Route::post('/email', [UserController::class,'sendMail'])->name('user.send.email');
     Route::post('/userPasswordChange/{id}', [UserController::class,'userPasswordChange'])->name('user.password.change');


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

        Route::get('/dashboard',[DashboardController::class,'employeeDashboard'])->middleware('auth:employee')->name('dashboard');

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');


          // =====================user route ======================
          Route::get('/all-user',[UserController::class,'index'])->name('all_user')->middleware('auth:employee');
          Route::get('/add-user',[UserController::class,'create'])->name('add_user');
          Route::post('/store-user',[UserController::class,'store'])->name('user.store');



          //Basic
           Route::get('/basic', [BasicAmountController::class, 'basic'])->middleware('auth:employee')->name('basicAmount');

          Route::get('/basic/showingData', [BasicAmountController::class, 'basicShowDataUpdate'])->name('basic_amount.update.search')->middleware('auth:employee');

          Route::post('/basic/update/{id}', [BasicAmountController::class, 'basicUpdateRequest'])->name('basic_amount.update')->middleware('auth:employee');

          Route::get('/add-basic-amount', [BasicAmountController::class, 'addBasicAmountSearch'])->middleware('auth:employee')->name('basic_amount.add');
          Route::get('/add-basic-create', [BasicAmountController::class, 'createBasicAmount'])->middleware('auth:employee')->name('basic_amount.create');
          Route::post('/add-basic-store/{user}', [BasicAmountController::class, 'basicAmountStore'])->middleware('auth:employee')->name('basic_amount.store');



          //** installment Routes */
          Route::get('/installment',[InstallmentController::class,'getFileNo'])->middleware('auth:employee')->name('installments');
          Route::post('/installment/find',[InstallmentController::class,'findFile'])->middleware('auth:employee')->name('installments.find');
          Route::get('/installment/all/{user}',[InstallmentController::class,'allInstallment'])->middleware('auth:employee')->name('installments.all');
          Route::get('/installment/edit/{id}',[InstallmentController::class,'editInstallment'])->middleware('auth:employee')->name('installments.edit');
          Route::post('/installment/edit/store/{id}',[InstallmentController::class,'storeEditInstallment'])->middleware('auth:employee')->name('installments.edit.store');
          Route::get('/installment/create/{user}/{installment_no}/{payment}',[InstallmentController::class,'createNewInstallment'])->middleware('auth:employee')->name('installments.create');
          Route::post('/installment/create/store/{user}/{installment_no}/{payment}',[InstallmentController::class,'storeNewInstallment'])->middleware('auth:employee')->name('installments.create.store');


          // ==================== Due Route ====================
          Route::get('/today-due',[DueController::class,'todayAllUserDue'])->name('all.user.due');
});




//basic amount routes








/***** Route with middleware */

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [UserController::class,'userProfile'])->name('user.profile');

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




Route::get('/roles', [PermissionController::class,'Permission']);
Route::get('/test', [TestController::class,'testTable'])->name('testTable');
Route::get('/permission_show', [PermissionController::class,'permission_show']);



//pdf routes for basic info
// Route::get('/member/{id}/viewpdf',[PdfController::class,'viewPDF'])->middleware('auth:super_admin');
// Route::get('/member/pdf/{id}',[PdfController::class,'pdfDownload'])->middleware('auth:super_admin');



// //excel
// Route::get('/export-excel/{id}',[ExcelController::class,'exportExcel'])->middleware('auth:super_admin')->name('download.excel');
// Route::get('/export-excel/installment/{id}',[ExcelController::class,'exportExcel'])->middleware('auth:super_admin');


// Route::get('/tables/index/{id}',[TableController::class,'basic'])->middleware('auth:super_admin');
// Route::get('/basic/showingtable',[TableController::class,'basicTable'])->middleware('auth:super_admin')->name('tableshow');
// Route::get('/basic/searchtable',[TableController::class,'basicSearch'])->middleware('auth:super_admin');




Route::get('/data/{id}', [BasicAmountUpdateController::class, 'getBasic_data'])->name('getData')->middleware('auth:super_admin');
Route::get('/fetchData/{id}', [BasicAmountUpdateController::class, 'fetch_data'])->middleware('auth:super_admin');
