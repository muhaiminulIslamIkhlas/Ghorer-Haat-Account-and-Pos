<?php

namespace App\Http\Controllers;

use App\AccountPayable;
use App\OnlineSale;
use App\WidthdrawMoney;
use Illuminate\Http\Request;
use Validator;
use App\AddMoney;
use DB;
use PDF;

class AccountController extends Controller
{
    public function addMoney()
    {
        return view('admin.account.addMoney');
    }

    public function addMoneySave(Request $request)
    {
        if ($request->ajax()) {
            $rules = array(
                'amount' => 'required',
                'depositor' => 'required',
                'date' => 'required',
                'account_type' => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'success' => $error->errors()->all()
                ]);
            }

            $data = new AddMoney();
            $data->depositor = $request->depositor;
            $data->amount = $request->amount;
            $data->date = $request->date;
            $data->account_type = $request->account_type;
            $data->save();

            return response()->json([
                'success' => 'Data Added successfully.'
            ]);
        }
    }

    public function addWidthdrw()
    {
        return view('admin.account.widthdraw');
    }

    public function TotalIncome($account){
        $incomeOnline=DB::table('online_sales')
            ->where('cash_type',$account)
            ->sum('amount');
        $incomeDirect=DB::table('direct_sells')
            ->where('cash_type',$account)
            ->sum('amount');
        $incomeOthers=DB::table('others')
            ->where('cash_type',$account)
            ->sum('amount');
        $tableAmount=DB::table('add_money')
            ->where('account_type',$account)
            ->sum('amount');
        $duePayment=DB::table('due_payments')
            ->where('cash_type',$account)
            ->sum('amount');

        $total=$incomeOnline+$incomeDirect+$incomeOthers+$tableAmount+$duePayment;
        return $total;
    }

    public function TotalExpenses($account){
        $company_purchases=DB::table('company_purchases')
            ->where('cash_type',$account)
            ->sum('amount');
        $expense_others=DB::table('expense_others')
            ->where('cash_type',$account)
            ->sum('amount');
        $office_costs=DB::table('office_costs')
            ->where('cash_type',$account)
            ->sum('amount');
        $purchases=DB::table('purchases')
            ->where('cash_type',$account)
            ->sum('amount');
        $widthdraw_money=DB::table('widthdraw_money')
            ->where('account_type',$account)
            ->sum('amount');

        return $company_purchases+$expense_others+$office_costs+$purchases+$widthdraw_money;
    }

    public function addWidthdrwSave(Request $request)
    {

        if ($request->ajax()) {
            $rules = array(
                'amount' => 'required',
                'name' => 'required',
                'date' => 'required',
                'account_type' => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error' => $error->errors()->all()
                ]);
            }

            $account=$request->account_type;

            if($account=='bkash'){
                $totalIncomeBkash=$this->TotalIncome($account);
                $totalExpense=$this->TotalExpenses($account);

                $amount=$totalIncomeBkash-$totalExpense;
                if($amount<$request->amount){


                    return response()->json([
                        'errors' => 'Balance available '.$amount.' so please try again.'
                    ]);
                }


            }elseif ($account=='cash'){
                $totalIncomeBkash=$this->TotalIncome($account);
                $totalExpense=$this->TotalExpenses($account);

                $amount=$totalIncomeBkash-$totalExpense;
                if($amount<$request->amount){


                    return response()->json([
                        'errors' => 'Balance available '.$amount.' so please try again.'
                    ]);
                }
            }else{
                $tableAmount=DB::table('add_money')
                    ->where('account_type',$account)
                    ->sum('amount');

                $widthdraw=DB::table('widthdraw_money')
                    ->where('account_type',$account)
                    ->sum('amount');
                $amount=$tableAmount-$widthdraw;
                if($amount<$request->amount){


                    return response()->json([
                        'errors' => 'Balance available '.$amount.' so please try again.'
                    ]);
                }
            }

            $data = new WidthdrawMoney();
            $data->name = $request->name;
            $data->amount = $request->amount;
            $data->account_type = $request->account_type;
            $data->date = $request->date;
            $data->save();

            $data = new AddMoney();
            $data->depositor = "Form system ".$account;
            $data->amount = $request->amount;
            $data->date = $request->date;
            $data->account_type = "cash";
            $data->save();


            return response()->json([
                'success' => 'Data Added successfully.'
            ]);
        }
    }

    public function dashboard(){
        $cash=$this->TotalIncome('cash')-$this->TotalExpenses('cash');
        $bkash=$this->TotalIncome('bkash')-$this->TotalExpenses('bkash');
        $due=DB::table('due_lists')->sum('amount');
        $account='bank';
        $tableAmount=DB::table('add_money')
            ->where('account_type',$account)
            ->sum('amount');

        $widthdraw=DB::table('widthdraw_money')
            ->where('account_type',$account)
            ->sum('amount');
        $bank=$tableAmount-$widthdraw;
        $accountPayable=DB::table('account_payables')
            ->sum('amount');
        return view('admin.dashboard.index',compact(['cash','bkash','due','bank','accountPayable']));
    }

    public function cashByDate($date,$account){
        $incomeOnline=DB::table('online_sales')
            ->where('cash_type',$account)
            ->whereDate('date', '<=', $date)
            ->sum('amount');
        $incomeDirect=DB::table('direct_sells')
            ->where('cash_type',$account)
            ->whereDate('date', '<=', $date)
            ->sum('amount');
        $incomeOthers=DB::table('others')
            ->where('cash_type',$account)
            ->whereDate('date', '<=', $date)
            ->sum('amount');
        $addMoney=DB::table('add_money')
            ->where('account_type',$account)
            ->whereDate('date', '<=', $date)
            ->sum('amount');
        $duePayment=DB::table('due_payments')
            ->where('cash_type',$account)
            ->whereDate('date', '<=', $date)
            ->sum('amount');

        return $total=$incomeOnline+$incomeDirect+$incomeOthers+$addMoney+$duePayment;
    }
    public function datewiseBank($date){
        $tableAmount=DB::table('add_money')
            ->where('account_type','bank')
            ->whereDate('date', '<=', $date)
            ->sum('amount');
        $widthdraw_money=DB::table('widthdraw_money')
            ->where('account_type','bank')
            ->whereDate('date', '<=', $date)
            ->sum('amount');

        return $tableAmount-$widthdraw_money;
    }
    public function expenseByDates($date,$account){
    $company_purchases=DB::table('company_purchases')
        ->where('cash_type',$account)
        ->whereDate('date', '<=', $date)
        ->sum('amount');
    $expense_others=DB::table('expense_others')
        ->where('cash_type',$account)
        ->whereDate('date', '<=', $date)
        ->sum('amount');
    $office_costs=DB::table('office_costs')
        ->where('cash_type',$account)
        ->whereDate('date', '<=', $date)
        ->sum('amount');
    $purchases=DB::table('purchases')
        ->where('cash_type',$account)
        ->whereDate('date', '<=', $date)
        ->sum('amount');
    $widthdraw_money=DB::table('widthdraw_money')
        ->where('account_type',$account)
        ->whereDate('date', '<=', $date)
        ->sum('amount');

    return $company_purchases+$expense_others+$office_costs+$purchases+$widthdraw_money;
   }

   public function onlineSellAmount($date){
       $incomeOnline=DB::table('online_sales')
           ->where('date', '=', $date)
           ->sum('amount');
       $incomeDue=DB::table('online_sales')
           ->where('date', '=', $date)
           ->sum('due');

       $total=$incomeOnline+$incomeDue;
       return $total;
   }

    public function directSellAmount($date){
        $incomeOnline=DB::table('direct_sells')
            ->where('date', '=', $date)
            ->sum('amount');
        $incomeDue=DB::table('direct_sells')
            ->where('date', '=', $date)
            ->sum('due');

        $total=$incomeOnline+$incomeDue;
        return $total;
    }

    public function othersIncome($date){
        $incomeOthers=DB::table('others')
            ->where('date', '=', $date)
            ->sum('amount');
    }


    public function pdfMaker(Request $request){
        $date=$request->date;
        $cash=$this->cashByDate($date,'cash')-$this->expenseByDates($date,'cash');
        $bkash=$this->cashByDate($date,'bkash')-$this->expenseByDates($date,'bkash');
        $bank=$this->datewiseBank($date);
        $onlineSellAmount=$this->onlineSellAmount($date);
        $directSellAmount=$this->directSellAmount($date);
        $othersIncome=$this->othersIncome($date);
        $company_purchases=DB::table('company_purchases')
            ->where('date', '=', $date)
            ->sum('amount');
        $expense_others=DB::table('expense_others')
            ->where('date', '=', $date)
            ->sum('amount');
        $office_costs=DB::table('office_costs')
            ->where('date', '=', $date)
            ->sum('amount');
        $purchases=DB::table('purchases')
            ->where('date', '=', $date)
            ->sum('amount');
        $due=$due=DB::table('due_lists')
            ->where('date','=',$date)
            ->sum('amount');

        return view('admin.report.report',compact(['cash','bkash','bank','onlineSellAmount','directSellAmount'
            ,'company_purchases','expense_others','office_costs','purchases','othersIncome','due','date']));
    }

    public function pdfMakerOnline(Request $request){
        $date=$request->date;
        $incomeOnline=DB::table('online_sales')
            ->where('date', '=', $date)
            ->get();

        $incomeDirect=DB::table('direct_sells')
            ->where('date', '=', $date)
            ->get();

        $pdf = PDF::loadView('admin.report.onlineSales', compact(['incomeOnline','incomeDirect','date']));
        return $pdf->stream('admin.report.onlineSales');
    }

    public function genratePdf($date){
        $cash=$this->cashByDate($date,'cash')-$this->expenseByDates($date,'cash');
        $bkash=$this->cashByDate($date,'bkash')-$this->expenseByDates($date,'bkash');
        $bank=$this->datewiseBank($date);
        $onlineSellAmount=$this->onlineSellAmount($date);
        $directSellAmount=$this->directSellAmount($date);
        $othersIncome=$this->othersIncome($date);
        $company_purchases=DB::table('company_purchases')
            ->where('date', '=', $date)
            ->sum('amount');
        $expense_others=DB::table('expense_others')
            ->where('date', '=', $date)
            ->sum('amount');
        $office_costs=DB::table('office_costs')
            ->where('date', '=', $date)
            ->sum('amount');
        $purchases=DB::table('purchases')
            ->where('date', '=', $date)
            ->sum('amount');
        $due=DB::table('due_lists')
            ->where('date','=',$date)
            ->sum('amount');

        $pdf = PDF::loadView('admin.report.pdfReport', compact(['cash','bkash','bank','onlineSellAmount','directSellAmount'
            ,'company_purchases','expense_others','office_costs','purchases','othersIncome','due','date']));

        return $pdf->stream('admin.report.pdfReport');
    }

    public function pdfMakerPurchase(Request $request){
        $date=$request->date;
        $company=DB::table('company_purchases')
            ->where('date', '=', $date)
            ->get();
        $companyTotal=DB::table('company_purchases')
            ->where('date', '=', $date)
            ->sum('amount');
        $sort=DB::table('purchases')
            ->where('date', '=', $date)
            ->get();
        $sortTotal=DB::table('purchases')
            ->where('date', '=', $date)
            ->sum('amount');
        $pdf = PDF::loadView('admin.report.purchase', compact(['company','sort','date','companyTotal','sortTotal']));
        return $pdf->stream('admin.report.purchase');
    }

    public function monthlyReport(Request $request){
        $month=$request->month;
        $year=$request->year;
        //all income
        $incomeOnline=DB::table('online_sales')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        $incomeDirect=DB::table('direct_sells')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        $incomeOthers=DB::table('others')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        $addMoney=DB::table('add_money')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        $duePayment=DB::table('due_payments')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        //all income summation
        $incomeOnlineTotal=DB::table('online_sales')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $incomeDirectTotal=DB::table('direct_sells')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $incomeOthersTotal=DB::table('others')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $addMoneyTotal=DB::table('add_money')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $duePaymentTotal=DB::table('due_payments')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        //Due
        $dueTotal=DB::table('due_lists')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $due=DB::table('due_lists')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        //Expenses list
        $company_purchases=DB::table('company_purchases')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        $expense_others=DB::table('expense_others')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        $office_costs=DB::table('office_costs')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        $purchases=DB::table('purchases')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        $widthdraw_money=DB::table('widthdraw_money')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();

        //Expenses Total
        $company_purchasesTotal=DB::table('company_purchases')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $expense_othersTotal=DB::table('expense_others')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $office_costsTotal=DB::table('office_costs')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $purchasesTotal=DB::table('purchases')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        $widthdraw_moneyTotal=DB::table('widthdraw_money')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        //Account Payable
        $payable=DB::table('account_payables')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->get();
        //Account Payable Total
        $payableTotal=DB::table('account_payables')
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('amount');
        //generate pdf
        $pdf = PDF::loadView('admin.report.monthlyReport', compact(['incomeOnline','incomeDirect','incomeOthers',
            'addMoney','duePayment'
        ,'incomeOnlineTotal','incomeDirectTotal','incomeOthersTotal','addMoneyTotal','duePaymentTotal','dueTotal',
            'due','company_purchases','expense_others','office_costs','purchases','widthdraw_money'
            ,'company_purchasesTotal','expense_othersTotal','office_costsTotal','purchasesTotal','widthdraw_moneyTotal'
            ,'payable','payableTotal','month','year']));
        return $pdf->stream('admin.report.monthlyReport');
    }
}
