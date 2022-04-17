<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(){
        $dossiers = DB::select('select * from dossiers');
        return view('./vendor/voyager/pages/browse',['dossiers'=>$dossiers]);
    }
    
}
