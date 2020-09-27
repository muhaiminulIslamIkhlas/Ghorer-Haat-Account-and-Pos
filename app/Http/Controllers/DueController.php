<?php

namespace App\Http\Controllers;

use App\DueList;
use App\DuePayment;
use Illuminate\Http\Request;
use DB;

class DueController extends Controller
{
    public function index(){
        $due=DB::table('due_lists')->get();

        return view('admin.due.index',compact('due'));
    }

    public function payment(Request $request)
    {
        $due_id=$request->due_id;
        /*$due=DB::table('due_lists')->find($due_id)->first();*/
        $due=DueList::find($due_id);
        if($due->amount<$request->amount){
            return response()->json([
                'error'=>'Amount is greater than total due due '.$due->amount.' pay'.$request->amount.' id '.$due_id.''
            ]);
        }

        $dueAmount=$due->amount-$request->amount;
        if($dueAmount==0){
            $due->delete();
            $this->addPayment($request);
            return response()->json([
                'success'=>'Payment complete'
            ]);
        }

        $due->amount=$dueAmount;
        $due->save();
        $this->addPayment($request);
        return response()->json([
            'success'=>'Payment complete'
        ]);



    }

    public function addPayment($request){
        $data=new DuePayment();
        $data->due_id=$request->due_id;
        $data->amount=$request->amount;
        $data->cash_type=$request->cash_type;
        $data->date=$request->date;
        $data->save();

    }
}
