<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ball;

class BallController extends Controller
{
    public function index(){
        $data = Ball::orderby('created_at', 'desc')->get();
        return view('ball', compact('data'));
    }

    public function store(request $request){
        // dd($request->all());

        $data  = new Ball();
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
