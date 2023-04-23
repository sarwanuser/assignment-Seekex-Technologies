<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ball;
use App\Bucket;

class BucketSuggestion extends Controller
{
    public function index(){
        $balls = Ball::orderby('created_at', 'desc')->get();
        $buckets = Bucket::orderby('created_at', 'desc')->get();
        return view('bucketsuggestion', compact('balls','buckets'));
    }

    public function calculate(request $request){
        $post = $request->all();
        
        $buckets = Bucket::select('name', 'value')->orderby('created_at', 'desc')->get();
        $buckets_array = [];
        foreach($buckets as $bucket){
            $buckets_array[$bucket->name] = $bucket->value;
        }
        
        $pink = $this->calculateValue('PINK',$request->pink);
        $red = $this->calculateValue('RED',$request->red);
        $blue = $this->calculateValue('BLUE',$request->blue);
        $orange = $this->calculateValue('ORANGE',$request->orange);
        $green = $this->calculateValue('GREEN',$request->green);

        $balls_array = array("PINK" => $pink, "RED" => $red, "BLUE" => $blue, "ORANGE" => $orange, "GREEN" => $green);
        //dd($balls_array);
        arsort($buckets_array);
        arsort($balls_array);
        $balls_ar_val = [];
        foreach($balls_array as $ball => $value){
            $balls_ar_val[] = ['ball' => $ball, 'value' => $value];
        }
        
        $x = 0;
        $result = [];
        $msg = '';
        foreach($buckets_array as $bucket => $value){
            $ball = strtolower($balls_ar_val[$x]['ball']);
            $ball_val = $balls_ar_val[$x]['value'];
            $epty = $value-$ball_val;
            if($epty < 0){
                $msg = 'Sorry, I cant give the bucket suggestion';
            }
            $result[] = ['bucket' => $bucket, 'value' => $value.','.$ball_val,'empty' => $epty, 'ball' => strtoupper($ball), 'no_ball' => $request->$ball, 'msg' => $msg];

            $x++;
        }
        
        $balls = Ball::orderby('created_at', 'desc')->get();
        $buckets = Bucket::orderby('created_at', 'desc')->get();
        return view('bucketsuggestion', compact('balls','buckets','result','post'));
        //return back()->compact('result');
    }

    // This function use for get the calculated value
    public function calculateValue($ball,$no){
        $ball = Ball::where('name', $ball)->first();
        return $value = $ball->value*$no;
    }
}
