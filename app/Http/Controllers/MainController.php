<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set_exam;
use App\Writting;
use App\ReadingFillWithOption;
use App\ReadingMultipleChoise;
use App\ReadingAnsMultiple;
use App\Speaking;
use Session;

class MainController extends Controller
{
    public function index()
    {
    	$data=Set_exam::get();
    	return view('welcome',compact('data'));
    }

    public function exam($id)
    {
    	Session::put('exam_set_id',$id);
    	$data=Writting::where('exam_set_id',$id)->get();
    	return view('student.writting',compact('data'));
    }

     public function exampost()
    {
    	$id=Session::get('exam_set_id');
    	$data=Writting::where('exam_set_id',$id)->get();
    	return view('student.writting',compact('data'));
    }

    public function reading()
    {
    	$id=Session::get('exam_set_id');
    	$data=ReadingFillWithOption::where('exam_set_id',$id)->get();
    	/*$qn=ReadingFillWithOption::where('exam_set_id',$id)->distinct('question_no')->count('question_no');*/
    	$qn=ReadingFillWithOption::select('question_no')->where('exam_set_id',$id)->distinct('question_no')->get();
    	 

    	 $mq=ReadingMultipleChoise::where('exam_set_id',$id)->get();

    	 $an=ReadingAnsMultiple::get();
    	return view('student.reading',compact('data','qn','mq','an'));
    	/*return response()->json($an);*/
    }

    public function speaking()
    {
    	$id=Session::get('exam_set_id');
    	$data=Speaking::where('exam_set_id',$id)->get();
    	return view('student.speaking',compact('data'));

    }
}
