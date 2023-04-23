<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bucket;

class BucketController extends Controller
{
    public function index(){
        $data = Bucket::orderby('created_at', 'desc')->get();
        return view('bucket', compact('data'));
    }


    public function store(request $request){
        // dd($request->all());

        $data  = new Bucket();
        $data->name  = $request->name;
        $data->value = $request->value;
        if ($data->save()) {
            return back()->with('Success', 'Data Saved Successfully');
        }
        else {
            return back()->with('Failed', 'Error while saving record');
        }
    }
}
