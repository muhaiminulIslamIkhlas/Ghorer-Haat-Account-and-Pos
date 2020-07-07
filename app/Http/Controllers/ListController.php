<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListController extends Controller
{
    public function otherIncome(){
      $date=date('Y-m-d');
      $incomeOthers=DB::table('others')
            ->where('date','=',$date)
            ->get();

      return response()->json(['incomeOthers'=>$incomeOthers]);
    }

    public function otherIncomeDelete(Request $request){
    	DB::table('others')->where('id', $request->rowId)->delete();
    	return response()->json([
            'success'=>'Item removed successfully'
        ]);
    }

    public function directSell(){
      $date=date('Y-m-d');
      $incomeOthers=DB::table('direct_sells')
            ->where('date','=',$date)
            ->get();

      return response()->json(['incomeOthers'=>$incomeOthers]);
    }

    public function directSellDelete(Request $request){
    	DB::table('direct_sells')->where('id', $request->rowId)->delete();
    	return response()->json([
            'success'=>'Item removed successfully'
        ]);
    }


    public function onlineSell(){
      $date=date('Y-m-d');
      $incomeOthers=DB::table('online_sales')
            ->where('date','=',$date)
            ->get();

      return response()->json(['incomeOthers'=>$incomeOthers]);
    }

    public function onlineSellDelete(Request $request){
    	DB::table('online_sales')->where('id', $request->rowId)->delete();
    	return response()->json([
            'success'=>'Item removed successfully'
        ]);
    }


    public function shortPurchase(){
      $date=date('Y-m-d');
      $incomeOthers=DB::table('purchases')
            ->where('date','=',$date)
            ->get();

      return response()->json(['incomeOthers'=>$incomeOthers]);
    }

    public function shortPurchaseDelete(Request $request){
    	DB::table('purchases')->where('id', $request->rowId)->delete();
    	return response()->json([
            'success'=>'Item removed successfully'
        ]);
    }

    public function otherExpenses(){
      $date=date('Y-m-d');
      $incomeOthers=DB::table('purchases')
            ->where('date','=',$date)
            ->get();

      return response()->json(['incomeOthers'=>$incomeOthers]);
    }

    public function otherExpensesDelete(Request $request){
    	DB::table('purchases')->where('id', $request->rowId)->delete();
    	return response()->json([
            'success'=>'Item removed successfully'
        ]);
    }

    public function companyPurchase(){
      $date=date('Y-m-d');
      $incomeOthers=DB::table('company_purchases')
            ->where('date','=',$date)
            ->get();

      return response()->json(['incomeOthers'=>$incomeOthers]);
    }

    public function companyPurchaseDelete(Request $request){
    	DB::table('company_purchases')->where('id', $request->rowId)->delete();
    	return response()->json([
            'success'=>'Item removed successfully'
        ]);
    }

    public function officeCost(){
      $date=date('Y-m-d');
      $incomeOthers=DB::table('office_costs')
            ->where('date','=',$date)
            ->get();

      return response()->json(['incomeOthers'=>$incomeOthers]);
    }

    public function officeCostDelete(Request $request){
    	DB::table('office_costs')->where('id', $request->rowId)->delete();
    	return response()->json([
            'success'=>'Item removed successfully'
        ]);
    }

    public function addMoney(){
      $date=date('Y-m-d');
      $incomeOthers=DB::table('add_money')
            ->where('date','=',$date)
            ->get();

      return response()->json(['incomeOthers'=>$incomeOthers]);
    }
}
