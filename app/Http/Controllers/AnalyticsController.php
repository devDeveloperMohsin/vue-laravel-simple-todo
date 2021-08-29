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
}
