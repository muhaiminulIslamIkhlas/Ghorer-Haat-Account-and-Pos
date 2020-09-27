<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Validator;

class GalleryController extends Controller
{
    function index()
    {
        return view('admin.dashboard.index');
    }

    function action(Request $request)
    {
        $path = "http://localhost/Project_1/public";
//        $data=$request->all();
//        return response()->json([
//            'data'=>$data
//        ]);
        $validation = Validator::make($request->all(), [
            'select_file.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageAll=$request->select_file;


        if ($validation->passes()) {
            for($count = 0; $count < count($imageAll); $count++){
                $image = $imageAll[$count];
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
                $object=new Gallery();
                $object->date=$request->date;
                $object->section=$request->section;
                $object->title=$request->date;
                $object->image=$path . '/images/' . $new_name;
                $object->save();
            }
//            $image = $request->file('select_file');
//            $new_name = rand() . '.' . $image->getClientOriginalExtension();
//            $image->move(public_path('images'), $new_name);
            return response()->json([
                'message' => 'Image Upload Successfully',
                'class_name' => 'success'
            ]);
        } else {
            return response()->json([
                'message' => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name' => 'alert-danger'
            ]);
        }
    }

}
