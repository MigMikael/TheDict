<?php

namespace App\Http\Controllers;

use App\EntoTh;
use App\ThtoEn;
use Request;
use Log;
use App\Http\Requests;

class TranslateController extends Controller
{
    public function index()
    {
        Log::info('Hello This is index');
        return view('index');
    }

    public function translateENtoTH()
    {
        $word = Request::get('word');
        $results = EntoTh::where('sentry' ,'=' , $word)->get();

        foreach ($results as $result){
            Log::info($result);
        }

        return view('index')->with('results', $results);
    }

    public function translateTHtoEN()
    {
        $word = Request::get('word');
        $results = ThtoEn::where('sentry', '=', $word)->get();

        foreach ($results as $result){
            Log::info($result);
        }

        return view('index')->with('results', $results);
    }
}
