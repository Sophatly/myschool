<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategroyAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount(){
        // $data['allData'] = FeeCategroyAmount::all();
        $data['allData'] = FeeCategroyAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.feeamount.view_feeamount', $data);
        
    }

    public function AddFeeAmount(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.feeamount.add_fee_amount',$data);
    }

    public function StoreFeeAmount(Request $request){
        $countClass = count($request->class_id);
        if ($countClass != NULL) {

            for ($i = 0; $i < $countClass;$i++){
                $fee_amount = new FeeCategroyAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            } // End for

        } // End if condition

        $notification = array(
            'message' => 'Fee Amount inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function EditFeeAmount($fee_category_id){
        $data['editData'] = FeeCategroyAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['editData']->toArray());
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.feeamount.edit_fee_amount', $data);
    }

    public function UpdateFeeAmount(Request $request,$fee_category_id){
        if($request->class_id == NULL){
            $notification = array(
                'message' => 'Sorry You do not select any class amount',
                'alert-type' => 'info'
            );
            return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);
        }else{
            $countClass = count($request->class_id);
            FeeCategroyAmount::where('fee_category_id', $fee_category_id)->delete();
            for($i=0;$i<$countClass;$i++){
                $fee_amount = new FeeCategroyAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        } // End else

        $notification = array(
            'message' => 'Data Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function DetailsFeeAmount($fee_category_id){
        $data['detailsData'] = FeeCategroyAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id','asc')->get();
        return view('backend.setup.feeamount.details_fee_amount', $data);
    }
}