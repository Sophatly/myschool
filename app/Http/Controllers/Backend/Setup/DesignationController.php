<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function DesignationView(){
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.designation_view', $data);
    }

    public function AddDesignation(){
        return view('backend.setup.designation.designation_add');
    }

    public function StoreDesignation(Request $request){
        $data = new Designation();
        $validatedData = $request->validate([
            'name' => 'required:designations,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Designation inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    public function EditDesignation($id){
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation',compact('editData'));
        
    }

    public function UpdateDesignation(Request $request,$id){
        $data = Designation::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Designation updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    public function DeleteDesignation($id){
        $data = Designation::find($id);
        $data->delete();
        return redirect()->route('designation.view');
    }
}