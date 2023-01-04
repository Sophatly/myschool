<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function ViewShift(){

        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    public function AddShift(){
        return view('backend.setup.shift.add_shift');
    }

    public function StoreShift(Request $request){
        $data = new StudentShift();
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Shift inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);

    }

    public function EditShift($id){
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function UpdateShift(Request $request,$id){
        $data = StudentShift::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Shift updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }

    public function DeleteShift($id){
        $data = StudentShift::find($id);
        $data->delete();
        return redirect()->route('student.shift.view');
    }
    
}