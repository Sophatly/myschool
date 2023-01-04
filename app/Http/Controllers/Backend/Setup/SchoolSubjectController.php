<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function ViewSchoolSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    public function AddSchoolSubject(){
        return view('backend.setup.school_subject.add_school_subject');
    }
    
    public function StoreSchoolSubject(Request $request){
        $data = new SchoolSubject();
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'School Subject inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }

    public function EditSubjectName($id){
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
    }

    public function UpdateSubjectName(Request $request,$id){
        $data = SchoolSubject::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Subject Name updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }

    public function DeleteSubjectName($id){
        $data = SchoolSubject::find($id);
        $data->delete();
        return redirect()->route('school.subject.view');
    }
}