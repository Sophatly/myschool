<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function ViewExamType(){

        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.exam_type_view',$data);
        
    }

    public function AddExamType(){

        return view('backend.setup.exam_type.exam_type_add');
    }

    public function StoreExamType(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name'
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function EditExamType($id){

        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('editData'));
    }

    public function UpdateExamType(Request $request,$id){
        $data = ExamType::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:exam_types,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Exam Type updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function DeleteExamType($id){
        $data = ExamType::find($id);
        $data->delete();
        return redirect()->route('exam.type.view');
    }
}