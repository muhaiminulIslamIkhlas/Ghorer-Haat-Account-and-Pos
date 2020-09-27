<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfficeCost;
use App\Purchase;
use App\CompanyPurchase;
use App\ExpenseOthers;
use Validator;
use DB;

class ExpenseController extends Controller
{
    public function officeCost(){
    	return view('admin.expense.officeCost');
    }

    public function accountCheck($cashCheck,$bkashCheck){
    	$cash=app('App\Http\Controllers\AccountController')->TotalIncome('cash')-app('App\Http\Controllers\AccountController')->TotalExpenses('cash');
    	$bkash=app('App\Http\Controllers\AccountController')->TotalIncome('bkash')-app('App\Http\Controllers\AccountController')->TotalExpenses('bkash');
    	if($cashCheck > $cash || $bkashCheck > $bkash){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function officeCostSave(Request $request){

		if($request->ajax())
		     {
		      $rules = array(
		       'amount.*'  => 'required',
		       'reason.*'  => 'required',
		       'date'  => 'required'
		      );
		      $error = Validator::make($request->all(), $rules);
		      if($error->fails())
		      {
		       return response()->json([
		        'error'  => $error->errors()->all()
		       ]);
		      }

		      $date = $request->date;
		      $reason = $request->reason;
		      $amount = $request->amount;
		      $cash_type = $request->cash_type;
		      $cashCheck=0;
		      $bkashCheck=0;
		      for($count = 0; $count < count($reason); $count++){
		      	if($cash_type[$count]=='cash'){
		      		$cashCheck = $amount[$count]+$cashCheck;
		      	}else if($cash_type[$count]=='bkash'){
		      		$bkashCheck=$amount[$count]+$bkashCheck;
		      	}
		      }

		      if($this->accountCheck($cashCheck,$bkashCheck)){
		      	return response()->json([
		       'error'  => 'You dont have enough balance.'
		      ]);
		      }




		      for($count = 0; $count < count($reason); $count++)
		      {
			       $data=new OfficeCost();
			       $data->date=$date;
			       $data->amount=$amount[$count];
			       $data->reason=$reason[$count];
			       $data->cash_type=$cash_type[$count];
			       $data->save();

		      }

		      //OnlineSale::insert($insert_data);
		     // DB::table('online_sales')->insert($data);
		      return response()->json([
		       'success'  => 'Data Added successfully.'
		      ]);
		      /*return redirect('/admin/create/reading');*/
		     }
    }


    public function shortPurchase(){
    	return view('admin.expense.shortPurchase');
    }


    public function shortPurchaseSave(Request $request){

    	if($request->ajax())
		     {
		      $rules = array(
		       'purchaser_name.*'  => 'required',
		       'amount.*'  => 'required',
		       'date'  => 'required'
		      );
		      $error = Validator::make($request->all(), $rules);
		      if($error->fails())
		      {
		       return response()->json([
		        'error'  => $error->errors()->all()
		       ]);
		      }

		      $date = $request->date;
		      $purchaser_name = $request->purchaser_name;
		      $amount = $request->amount;
		      $cash_type = $request->cash_type;

		      $cashCheck=0;
		      $bkashCheck=0;
		      for($count = 0; $count < count($purchaser_name); $count++){
		      	if($cash_type[$count]=='cash'){
		      		$cashCheck = $amount[$count]+$cashCheck;
		      	}else if($cash_type[$count]=='bkash'){
		      		$bkashCheck=$amount[$count]+$bkashCheck;
		      	}
		      }

		      if($this->accountCheck($cashCheck,$bkashCheck)){
		      	return response()->json([
		       'error'  => 'You dont have enough balance.'
		      ]);
		      }


		      for($count = 0; $count < count($purchaser_name); $count++)
		      {
			       $data=new Purchase();
			       $data->date=$date;
			       $data->amount=$amount[$count];
			       $data->purchaser_name=$purchaser_name[$count];
			       $data->cash_type=$cash_type[$count];
			       $data->save();

		      }

		      //OnlineSale::insert($insert_data);
		     // DB::table('online_sales')->insert($data);
		      return response()->json([
		       'success'  => 'Data Added successfully.'
		      ]);
		      /*return redirect('/admin/create/reading');*/
		     }
    }

    public function companyPurchase(){
    	return view('admin.expense.companyPurchase');
    }

    public function companyPurchaseSave(Request $request){


    	if($request->ajax())
		     {
		      $rules = array(
		       'company_name.*'  => 'required',
		       'amount.*'  => 'required',
		       'date'  => 'required'
		      );
		      $error = Validator::make($request->all(), $rules);
		      if($error->fails())
		      {
		       return response()->json([
		        'error'  => $error->errors()->all()
		       ]);
		      }

		      $date = $request->date;
		      $company_name = $request->company_name;
		      $amount = $request->amount;
		      $cash_type = $request->cash_type;

		      $cashCheck=0;
		      $bkashCheck=0;
		      for($count = 0; $count < count($company_name); $count++){
		      	if($cash_type[$count]=='cash'){
		      		$cashCheck = $amount[$count]+$cashCheck;
		      	}else if($cash_type[$count]=='bkash'){
		      		$bkashCheck=$amount[$count]+$bkashCheck;
		      	}
		      }

		      if($this->accountCheck($cashCheck,$bkashCheck)){
		      	return response()->json([
		       'error'  => 'You dont have enough balance.'
		      ]);
		      }


		      for($count = 0; $count < count($company_name); $count++)
		      {
			       $data=new CompanyPurchase();
			       $data->date=$date;
			       $data->amount=$amount[$count];
			       $data->company_name=$company_name[$count];
			       $data->cash_type=$cash_type[$count];
			       $data->save();

		      }

		      //OnlineSale::insert($insert_data);
		     // DB::table('online_sales')->insert($data);
		      return response()->json([
		       'success'  => 'Data Added successfully.'
		      ]);
		      /*return redirect('/admin/create/reading');*/
		     }
    }

    public function otherExpense(){
    	return view('admin.expense.otherExpense');
    }

    public function otherExpenseSave(Request $request){
    	   if($request->ajax())
		     {
		      $rules = array(
		       'name.*'  => 'required',
		       'amount.*'  => 'required',
		       'date'  => 'required'
		      );
		      $error = Validator::make($request->all(), $rules);
		      if($error->fails())
		      {
		       return response()->json([
		        'error'  => $error->errors()->all()
		       ]);
		      }

		      $date = $request->date;
		      $name = $request->name;
		      $amount = $request->amount;
		      $cash_type = $request->cash_type;


		      $cashCheck=0;
		      $bkashCheck=0;
		      for($count = 0; $count < count($name); $count++){
		      	if($cash_type[$count]=='cash'){
		      		$cashCheck = $amount[$count]+$cashCheck;
		      	}else if($cash_type[$count]=='bkash'){
		      		$bkashCheck=$amount[$count]+$bkashCheck;
		      	}
		      }

		      if($this->accountCheck($cashCheck,$bkashCheck)){
		      	return response()->json([
		       'error'  => 'You dont have enough balance.'
		      ]);
		      }


		      for($count = 0; $count < count($name); $count++)
		      {
		         $data=new ExpenseOthers();
		         $data->date=$date;
		         $data->amount=$amount[$count];
		         $data->name=$name[$count];
		         $data->cash_type=$cash_type[$count];
		         $data->save();

		      }

		      return response()->json([
		       'success'  => 'Data Added successfully.'
		      ]);
		     }
    }
}
