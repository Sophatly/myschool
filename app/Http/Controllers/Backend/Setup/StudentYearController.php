<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear(){

        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);   
        
    }

    public function AddYear(Request $request)
    {
        return view('backend.setup.year.add_year');

    }

    public function StoreYear(Request $request){

        $data = new StudentYear();

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name'
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function EditYear($id){

        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }

    public function UpdateYear(Request $request,$id){

        $data = StudentYear::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name'
        ]);

        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
        
    }

    public function DeleteYear($id){

        $data = StudentYear::find($id);
        $data->delete();

        return redirect()->route('student.year.view');
    }

}