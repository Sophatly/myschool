<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\UserController;

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\Backend\Setup\SutdentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Setup\Student\StudentRegController;
use App\Http\Controllers\Backend\Setup\Student\StudentRollController;
use App\Http\Controllers\Backend\Setup\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Setup\Student\ExamFeeController;


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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('admin/logout', [AdminController::class,'AdminLogout'])->name('admin.logout');


Route::group(['middleware' => 'auth'], function () {
    
// User Management All routes

Route::prefix('users')->group(function () {

    Route::get('/view', [UserController::class,'UserView'])->name('user.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

    Route::post('/store', [UserController::class,'UserStore'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
});

// User Profile All routes
Route::prefix('profile')->group(function () {

    Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');

    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
});

// Setup Management
Route::prefix('setups')->group(function () {

    Route::get('student/class/view',[SutdentClassController::class,'ViewStudent'])->name('student.class.view');
    Route::get('student/class/add', [SutdentClassController::class, 'StudentClassAdd'])->name('student.class.add');
    Route::post('student/class/store', [SutdentClassController::class,'StudentClassStore'])->name('store.student.class');

    Route::get('student/class/edit/{id}',[SutdentClassController::class,'StudentClassEdit'])->name('student.class.edit');
    Route::post('student/class/update/{id}',[SutdentClassController::class,'StudentClassUpdate'])->name('update.student.class');

    Route::get('student/class/delete/{id}',[SutdentClassController::class,'StudentClassDelete'])->name('student.class.delete');

    // Student Year route

    Route::get('student/year/view',[StudentYearController::class,'ViewYear'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearController::class, 'AddYear'])->name('student.year.add');
    Route::post('student/year/store', [StudentYearController::class, 'StoreYear'])->name('store.student.year');

    Route::get('student/year/edit/{id}', [StudentYearController::class, 'EditYear'])->name('student.year.edit');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'UpdateYear'])->name('update.student.year');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'DeleteYear'])->name('student.year.delete');

    // Student Group routes
    Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
    Route::get('student/group/add', [StudentGroupController::class, 'AddGroup'])->name('student.group.add');
    Route::post('student/group/store', [StudentGroupController::class, 'StoreGroup'])->name('store.student.group');

    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'EditGroup'])->name('student.group.edit');
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'UpdateGroup'])->name('update.student.group');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'DeleteGroup'])->name('student.group.delete');

    // Student Shift routes
    Route::get('student/shift/view', [StudentShiftController::class,'ViewShift'])->name('student.shift.view');
    Route::get('student/shift/add', [StudentShiftController::class, 'AddShift'])->name('student.shift.add');
    Route::post('student/shfit/store', [StudentShiftController::class, 'StoreShift'])->name('store.student.shift');

    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'EditShift'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'UpdateShift'])->name('update.student.shift');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'DeleteShift'])->name('student.shift.delete');

    // Fee Category Routes
    Route::get('fee/category/view', [FeeCategoryController::class,'ViewFeeCategory'])->name('fee.category.view');
    Route::get('fee/category/add', [FeeCategoryController::class, 'AddFeeCategory'])->name('fee.category.add');
    Route::post('fee/category/store', [FeeCategoryController::class, 'StoreFeeCategory'])->name('store.fee.category');

    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'EditFeeCategory'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'UpdateFeeCategory'])->name('update.fee.category');
    Route::get('fee/category/delete{id}', [FeeCategoryController::class, 'DeleteFeeCategory'])->name('fee.category.delete');

    // Fee Category Amount Routes
    Route::get('fee/amount/view', [FeeAmountController::class, 'ViewFeeAmount'])->name('fee.amount.view');
    Route::get('fee/amount/add', [FeeAmountController::class, 'AddFeeAmount'])->name('fee.amount.add');
    Route::post('fee/amount/store', [FeeAmountController::class, 'StoreFeeAmount'])->name('store.fee.amount');

    Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'EditFeeAmount'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'UpdateFeeAmount'])->name('update.fee.amount');

    Route::get('fee/amount/detail/{fee_category_id}', [FeeAmountController::class, 'DetailsFeeAmount'])->name('fee.amount.details');

    // Exam Type
    Route::get('exam/type/view', [ExamTypeController::class,'ViewExamType'])->name('exam.type.view');
    Route::get('exam/type/add', [ExamTypeController::class, 'AddExamType'])->name('exam.type.add');
    Route::post('exam/type/store', [ExamTypeController::class, 'StoreExamType'])->name('store.exam.type');

    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'EditExamType'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'UpdateExamType'])->name('update.exam.type');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'DeleteExamType'])->name('delete.exam.type');

    // School Subject Routes
    Route::get('school/subject/view', [SchoolSubjectController::class, 'ViewSchoolSubject'])->name('school.subject.view');
    Route::get('school/subject/add', [SchoolSubjectController::class, 'AddSchoolSubject'])->name('school.subject.add');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'StoreSchoolSubject'])->name('store.school.subject');

    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'EditSubjectName'])->name('school.subject.edit');
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'UpdateSubjectName'])->name('update.school.subject');
    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'DeleteSubjectName'])->name('school.subject.delete');

    // Asign Subject Routes
    Route::get('assign/subject/view', [AssignSubjectController::class, 'ViewAssignSubject'])->name('assign.subject.view');
    Route::get('assign/subject/add', [AssignSubjectController::class, 'AddAssignSubject'])->name('assign.subject.add');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'StoreAssignSubject'])->name('store.assign.subject');

    Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'EditAssignSubject'])->name('assign.subject.edit');
    Route::post('assign/sbuject/update/{class_id}', [AssignSubjectController::class, 'UpdateAssignSubject'])->name('update.assign.subject');
    Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'DetailsAssignSubject'])->name('assign.subject.details');

    // Designation Routes
    Route::get('designation/view', [DesignationController::class, 'DesignationView'])->name('designation.view');
    Route::get('designation/add', [DesignationController::class, 'AddDesignation'])->name('designation.add');
    Route::post('designation/store', [DesignationController::class, 'StoreDesignation'])->name('store.designation');

    Route::get('designation/edit/{id}', [DesignationController::class, 'EditDesignation'])->name('designation.edit');
    Route::post('designation/update/{id}', [DesignationController::class, 'UpdateDesignation'])->name('update.designation');
    Route::get('designation/delete/{id}', [DesignationController::class, 'DeleteDesignation'])->name('designation.delete');
});


Route::prefix('students')->group(function () {
    Route::get('registration/view', [StudentRegController::class,'StudentRegView'])->name('student.registration.view');
    Route::get('registration/add', [StudentRegController::class,'StudentRegAdd'])->name('student.registration.add');
    Route::post('registration/store', [StudentRegController::class, 'StudentRegStore'])->name('store.student.registration');

    Route::get('year/class/wise', [StudentRegController::class, 'StudentClassYearWise'])->name('student.year.class.wise');

    Route::get('registration/edit/{student_id}', [StudentRegController::class, 'StudentRegEdit'])->name('student.registration.edit');
    Route::post('registration/update/{student_id}', [StudentRegController::class, 'StudentRegUpdate'])->name('update.student.registration');

    Route::get('/student/promotion/{student_id}', [StudentRegController::class, 'StudentPromotion'])->name('student.registration.promotion');
    Route::post('/student/promotion/update/{student_id}', [StudentRegController::class, 'StudentPromotionUpdate'])->name('promotion.student.registration');
    Route::get('/student/detail/{student_id}', [StudentRegController::class, 'StudentRegDetail'])->name('student.reg.detail');

    // Roll Generate Route
    Route::get('/roll/generate/view', [StudentRollController::class, 'StudentRollView'])->name('roll.generate.view');
    Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');
    Route::get('/reg/getstudents', [StudentRollController::class, 'GetStudents'])->name('student.registration.getstudents');

    Route::post('/reg/generate/store', [StudentRollController::class, 'StudentRollStore'])->name('roll.generate.store');   
    
    // Registration Fee Routes
    Route::get('/reg/fee/view', [RegistrationFeeController::class,'RegFeeView'])->name('registration.fee');
    Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class,'RegFeeClassData'])->name('student.registration.fee.classwise.get');
    Route::get('/reg/fee/payslip', [RegistrationFeeController::class,'RegFeePaySlip'])->name('student.registration.fee.payslip');

    // Monthly Fee Routes
    Route::get('/monthly/fee/view', [MonthlyFeeController::class,'MonthlyFeeView'])->name('monthly.fee.view');
    Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class,'MonthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
    Route::get('/monthly/fee/payslip', [MonthlyFeeController::class,'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');
    

    // Exam Fee Routes
    Route::get('/examfee/view', [ExamFeeController::class,'ExamFeeView'])->name('exam.fee.view');
    Route::get('/exam/fee/classwisedata', [ExamFeeController::class,'ExamFeeClassData'])->name('student.exam.fee.classwise.get');
    Route::get('/exam/fee/payslip', [ExamFeeController::class,'ExamFeePayslip'])->name('student.exam.fee.payslip');

});

    Route::prefix('employees')->group(function () {
        
        Route::get('employee/view', [EmployeeRegController::class,'EmployeeView'])->name('employee.reg.view');
        Route::get('employee/add', [EmployeeRegController::class,'EmployeeAdd'])->name('employee.registration.add');
        Route::post('employee/store', [EmployeeRegController::class,'EmployeeStore'])->name('store.employee.registration');

        Route::get('employee/edit/{id}', [EmployeeRegController::class,'EmployeeEdit'])->name('employee.registration.edit');
        Route::post('employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('update.employee.registration');
        
        Route::get('employee/details/{id}', [EmployeeRegController::class,'EmployeeDetails'])->name('employee.registration.details');

        // Employee Salary All Routes
        Route::get('salary/employee/view',[EmployeeSalaryController::class,'SalaryView'])->name('employee.salary.view');
        Route::get('salary/edit/{id}', [EmployeeSalaryController::class, 'SalaryIncrement'])->name('employee.salary.increment');
        Route::post('salary/store/{id}',[EmployeeSalaryController::class,'SalaryStore'])->name('update.increment.store');

        Route::get('salary/details/{id}', [EmployeeSalaryController::class, 'SalaryDetails'])->name('employee.salary.details');
        
        // Employee Leave All Routes
        Route::get('leave/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
        Route::get('leave/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');
        Route::post('leave/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('store.employee.leave');

        Route::get('leave/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');
        Route::post('leave/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('update.employee.leave');
        Route::get('leave/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');

        // Employee Attendance All Routes
        Route::get('attendance/view', [EmployeeAttendanceController::class,'AttendanceView'])->name('employee.attendance.view');
        Route::get('attendance/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');
        Route::post('attendance/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('store.employee.attendance');

        Route::get('attendance/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');
        Route::get('attendance/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');

        // Employee Monthly Salary All Routes
        Route::get('monthly/salary/view',[MonthlySalaryController::class,"MonthlySalaryView"])->name('employee.monthly.salary');
        Route::get('monthly/salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');
        Route::get('monthly/salary/payslip/{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');
        
    });

    Route::prefix('marks')->group(function () {
        
        Route::get('entry/add',[MarksController::class,'MarksAdd'])->name('marks.entry.add');
        Route::post('entry/store',[MarksController::class,'MarksStore'])->name('marks.entry.store');
    });

    Route::get('marks/getsubject', [DefaultController::class, 'GetSubjects'])->name('marks.getsubject');
    Route::get('student/marks/getsubject', [DefaultController::class, 'Getstudents'])->name('student.marks.getstudents');
    
}); //End Middleware Auth Route