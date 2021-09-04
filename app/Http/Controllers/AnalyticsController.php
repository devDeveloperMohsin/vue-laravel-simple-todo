<?php

namespace App\Http\Controllers;

use App\Models\RequestLog;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index(){
        $analytics = RequestLog::latest()->get();
        return response()->json($analytics);
    }

    public function test(){
        $x = "foo";
        $this->$x();
    }

    public function foo()
        {
            echo 'hello';
        }
}
