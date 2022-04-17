<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index(){
        $posts = DB::select('select * from posts');
        return view('./vendor/voyager/posts/browse',['posts'=>$posts]);
    }

}
