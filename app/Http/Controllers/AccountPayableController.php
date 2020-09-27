<?php

namespace App\Http\Controllers;

use App\CompanyPurchase;
use App\ExpenseOthers;
use App\OfficeCost;
use App\PayablePayment;
use App\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\ExpenseController;
use App\AccountPayable;
use Validator;
use DB;

class AccountPayableController extends Controller
{
    public function index(){
        $payable=AccountPayable::all();
        return view('admin.payable.index',compact('payable'));
    }
    public function add(){
        return view('admin.payable.add');
    }
    public function save(Request $request){
        $data=new AccountPayable();
        $data->date=$request->date;
        $data->reason=$request->reason;
        $data->amount=$request->amount;
        $data->payable_type=$request->payable_type;
        $data->save();

        return response()->json([
            'success' => 'Data Added successfully.'
        ]);
    }

    public function accountCheck($cashCheck,$cashType){
        if($cashType=='bkash'){
            $bkash=app('App\Http\Controllers\AccountController')->TotalIncome('bkash')-app('App\Http\Controllers\AccountController')->TotalExpenses('bkash');
            if($cashCheck > $bkash){
                return true;
            }else{
                return false;
            }
        }else{
            $cash=app('App\Http\Controllers\AccountController')->TotalIncome('cash')-app('App\Http\Controllers\AccountController')->TotalExpenses('cash');
        
        if($cashCheck > $cash){
            return true;
        }else{
            return false;
        }
        }

        
    }

    public function payment(Request $request){
        $dataPayable=AccountPayable::find($request->payable_id);
        if($request->amount>$dataPayable->amount){
            return response()->json(['error'=>'Amount is greater than due']);
        }

        if($this->accountCheck($request->amount,$request->cash_type)){
            return response()->json(['error'=>'Not enough balance']);
        }

        if($dataPayable->payable_type=='Sort purchase'){
            $data=new Purchase();
            $data->date=$request->date;
            $data->amount=$request->amount;
            $data->purchaser_name=$dataPayable->reason;
            $data->cash_type=$request->cash_type;
            $data->save();

            $total=$dataPayable->amount=$dataPayable->amount-$request->amount;
            if($total>0){
                $dataPayable->save();
            }else{
                $dataPayable->delete();
            }


            $payment=new PayablePayment();
            $payment->date=$request->date;
            $payment->amount=$request->amount;
            $payment->payable_id=$request->payable_id;
            $payment->reason=$dataPayable->reason;
            $payment->save();

            return response()->json(['success'=>'Data saved successfully']);



        }elseif ($dataPayable->payable_type=='Company purchase'){
            $data=new CompanyPurchase();
            $data->date=$request->date;
            $data->amount=$request->amount;
            $data->company_name=$dataPayable->reason;
            $data->cash_type=$request->cash_type;
            $data->save();

            $total=$dataPayable->amount=$dataPayable->amount-$request->amount;
            if($total>0){
                $dataPayable->save();
            }else{
                $dataPayable->delete();
            }

            $payment=new PayablePayment();
            $payment->date=$request->date;
            $payment->amount=$request->amount;
            $payment->payable_id=$request->payable_id;
            $payment->reason=$dataPayable->reason;
            $payment->save();

            return response()->json(['success'=>'Data saved successfully']);
        }elseif ($dataPayable->payable_type=='Others'){
            $data=new ExpenseOthers();
            $data->date=$request->date;
            $data->amount=$request->amount;
            $data->name=$dataPayable->reason;
            $data->cash_type=$request->cash_type;
            $data->save();

            $dataPayable->amount=$dataPayable->amount-$request->amount;
            $dataPayable->save();

            $payment=new PayablePayment();
            $payment->date=$request->date;
            $payment->amount=$request->amount;
            $payment->payable_id=$request->payable_id;
            $payment->reason=$dataPayable->reason;
            $payment->save();

            return response()->json(['success'=>'Data saved successfully']);
        }else{
            $data=new OfficeCost();
            $data->date=$request->date;
            $data->amount=$request->amount;
            $data->reason=$dataPayable->reason;
            $data->cash_type=$request->cash_type;
            $data->save();

            $total=$dataPayable->amount=$dataPayable->amount-$request->amount;
            if($total>0){
                $dataPayable->save();
            }else{
                $dataPayable->delete();
            }

            $payment=new PayablePayment();
            $payment->date=$request->date;
            $payment->amount=$request->amount;
            $payment->payable_id=$request->payable_id;
            $payment->reason=$dataPayable->reason;
            $payment->save();

            return response()->json(['success'=>'Data saved successfully']);
        }
    }

    public function AllPayment(){
        $data=PayablePayment::all();
        return view('admin.payable.allPayment',compact('data'));
    }
}
