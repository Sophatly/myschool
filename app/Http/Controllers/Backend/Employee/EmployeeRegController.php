<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use DB;
use PDF;
class EmployeeRegController extends Controller
{
    public function EmployeeView(){

        $data['allData'] = User::where('usertype', 'employee')->get();
        return view('backend.employee.employee_reg.employee_view', $data);
    }

    public function EmployeeAdd(){
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_reg.employee_add',$data);
    }

    public function EmployeeStore(Request $request){

        DB::transaction(function () use ($request) {

            $checkYear = date('Ym',strtotime($request->join_date));
            
            $employee = User::where('usertype', 'employee')->orderBy('id', 'DESC')->first();

            if($employee == null){
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00' . $employeeId;
                }elseif($employeeId < 1000){
                    $id_no = '0' . $employeeId;
                }
            }else{
                $employee = User::where('usertype', 'employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee + 1;
                if($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                }elseif($employeeId < 100){
                    $id_no = '00' . $employee;
                }elseif($employeeId < 1000){
                    $id_no = '0' . $employeeId;
                }
            } //End Else

            $final_id_no = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            
            if($request->file('image')){

                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_images') , $filename);
                $user['userimage'] = $filename;
            }

            $user->save();

            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();
           
        });

        $notification = array(
            'message' => 'Employee Registration inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('employee.reg.view')->with($notification);
    }

    public function EmployeeEdit($id){
        $data['editData'] = User::find($id);
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_reg.employee_edit', $data);
    }

    public function EmployeeUpdate(Request $request,$id){

            $user = User::find($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            
            if($request->file('image')){

                $file = $request->file('image');
            @unlink(public_path('upload/employee_images/' . $user->userimage));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_images') , $filename);
                $user['userimage'] = $filename;
            }

            $user->save();

        $notification = array(
            'message' => 'Employee Registration updated Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('employee.reg.view')->with($notification);
        
    } // End Method

    public function EmployeeDetails($id){

        $data['details'] = User::find($id);
        
        $employeeName = User::find($id);
        $getName = $employeeName->name;
        $finalName = $getName;
        
        $pdf = PDF::loadView('backend.employee.employee_reg.employee_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream($finalName);
    }
}