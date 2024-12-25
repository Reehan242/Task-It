<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request, string $data = 'default'){
        if($request->route()->named('greet')){
            return 'hallo '. $data;
        }
        else if ($request->route()->named('nigga')){
            return 'this is nigga with default value : ' . $data;
        }
        else{
            return view('welcome');    
        }
        
    }
}
