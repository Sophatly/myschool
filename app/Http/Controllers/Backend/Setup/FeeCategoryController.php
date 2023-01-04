<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory(){
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.feecategory.view_feecategory', $data);
    }

    public function AddFeeCategory(){
        return view('backend.setup.feecategory.add_feecategory');
    }

    public function StoreFeeCategory(Request $request){
        $data = new FeeCategory();
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Fee Category inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }

    public function EditFeeCategory($id){
        $editData = FeeCategory::find($id);
        return view('backend.setup.feecategory.edit_feecategory', compact('editData'));
    }

    public function UpdateFeeCategory(Request $request,$id){
        $data = FeeCategory::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_categories,name'
        ]);
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'Fee Category updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }

    public function DeleteFeeCategory($id){
        $data = FeeCategory::find($id);
        $data->delete();
        return redirect()->route('fee.category.view');
    }
}