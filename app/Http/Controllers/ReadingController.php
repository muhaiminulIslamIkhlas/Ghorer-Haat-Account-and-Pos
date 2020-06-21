<?php

namespace App\Http\Controllers;

use App\DueList;
use Illuminate\Http\Request;
use App\OnlineSale;
use App\DirectSell;
use App\Other;
use Validator;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReadingController extends Controller
{
    public function onlineSale()
    {

    	return view('admin.reading.createblankwithoption');
    }

    public function saveOnlineSales(Request $request)
    {
    if($request->ajax())
     {
      $rules = array(
       'order_number.*'  => 'required',
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
      $order_number = $request->order_number;
      $amount = $request->amount;
      $due = $request->due;
      $due_source = $request->due_source;
      $cash_type = $request->cash_type;


      for($count = 0; $count < count($order_number); $count++)
      {
       $data=new OnlineSale();
       $data->date=$date;
       $data->amount=$amount[$count];
       $data->order_number=$order_number[$count];
       $data->due=$due[$count];
       $data->due_source=$due_source[$count];
       $data->cash_type=$cash_type[$count];
       $data->save();

       $num=(int)$data->due;

       if($num>0){
           $dueList=new DueList();
           $dueList->table_id=$data->id;
           $dueList->sales_type="online";
           $dueList->name=$data->order_number;
           $dueList->amount=$data->due;
           $dueList->date=$data->date;
           $dueList->save();
       }

      }

      //OnlineSale::insert($insert_data);
     // DB::table('online_sales')->insert($data);
      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
      /*return redirect('/admin/create/reading');*/
     }
    }

    public function directSell(){
      return view('admin.reading.directSell');
    }

    public function directSaleSave(Request $request){

      if($request->ajax())
     {
      $rules = array(
       'customer_name.*'  => 'required',
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
      $name = $request->customer_name;
      $amount = $request->amount;
      $due = $request->due;
      $cash_type = $request->cash_type;
      $due_source = $request->due_source;


      for($count = 0; $count < count($name); $count++)
      {
         $data=new DirectSell();
         $data->date=$date;
         $data->amount=$amount[$count];
         $data->customer_name=$name[$count];
         $data->cash_type=$cash_type[$count];
         $data->due=$due[$count];
         $data->due_source=$due_source[$count];
         $data->save();

          $num=(int)$data->due;

          if($num>0){
              $dueList=new DueList();
              $dueList->table_id=$data->id;
              $dueList->sales_type="direct";
              $dueList->name=$data->customer_name;
              $dueList->amount=$data->due;
              $dueList->date=$data->date;
              $dueList->save();
          }

      }

      return response()->json([
       'success'  => 'Data Added successfully.'
      ]);
     }

    }


    public function other(){
      return view('admin.reading.other');
    }

    public function otherSave(Request $request){


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


      for($count = 0; $count < count($name); $count++)
      {
         $data=new Other();
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
