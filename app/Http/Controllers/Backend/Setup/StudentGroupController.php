<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function ViewGroup(){

        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
        
    }

    public function AddGroup(){
        return view('backend.setup.group.add_group');
    }

    public function StoreGroup(Request $request){

        $data = new StudentGroup();
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Group inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
        
    }

    public function EditGroup($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }

    public function UpdateGroup(Request $request,$id){

        $data = StudentGroup::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Student Group updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.group.view')->with($notification);
    }

    public function DeleteGroup($id){
        $data = StudentGroup::find($id);
        $data->delete();
        return redirect()->route('student.group.view');
    }
}