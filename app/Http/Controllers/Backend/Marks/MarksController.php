<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\StudentGroup;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\AssignSubject;
use App\Models\StudentShift;

use DB;
use PDF;

class MarksController extends Controller
{
    public function MarksAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('backend.marks.marks_add',$data);
    }

    public function MarksStore(Request $request){

        $studentcount = $request->student_id;

        if($studentcount){

            for($i=0;$i<count($request->student_id);$i++){

                $data = new StudentMarks();
                $data->year_id = $request->year_id;
                $data->class_id = $request->class_id;
                $data->assign_subject_id = $request->assign_subject_id;
                $data->exam_type_id = $request->exam_type_id;
                $data->student_id = $request->student_id[$i];
                $data->id_no = $request->id_no[$i];
                $data->marks = $request->marks[$i];
                $data->save();

            } /* End For Loop */
        }

        $notification = array(
            'message' => 'Student Marks Data insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    }
}