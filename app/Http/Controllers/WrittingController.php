<?php

namespace App\Http\Controllers;
use DB;
use App\Set_exam;
use App\Writting;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class WrittingController extends Controller
{
    public function create()
    {
    	$exam_set=Set_exam::get();
    	return view('admin.writting.create',compact('exam_set'));
    }

    public function save(Request $request)
    {
    	$writting=new Writting();
    	$writting->exam_set_id=$request->exam_set_id;
    	$writting->question=$request->question;
    	$writting->status=1;
    	$writting->question_sort_code=$request->question_sort_code;
    	$writting->save();
    	Alert::success('Success', 'Question set up successfully');
    	return redirect('/admin/index/writting');

    }

    public function index()
    {
    	$data=DB::table('writtings')
    				->join('set_exams','set_exams.id','writtings.exam_set_id')
    				->select('writtings.*','set_exams.exam_set')
    				->get();
    	return view('admin.writting.index',compact('data'));
    }

    public function delete($id)
    {
    	$data=Writting::find($id);
    	$data->delete();
    	Alert::error('Delete', 'Question deleted successfully');
    	return redirect('/admin/index/writting');
    }

    public function close($id)
    {
    	$data=Writting::find($id);
    	$data->status=0;
    	$data->save();
    	Alert::warning('Close', 'Question closed successfully');
    	return redirect('/admin/index/writting');

    }

    public function available($id)
    {
    	$data=Writting::find($id);
    	$data->status=1;
    	$data->save();
    	Alert::success('Available', 'Question availabled successfully');
    	return redirect('/admin/index/writting');

    }
}
