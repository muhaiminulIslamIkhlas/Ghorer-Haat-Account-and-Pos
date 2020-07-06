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
}
