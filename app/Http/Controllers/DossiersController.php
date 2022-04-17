<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DossiersController extends Controller
{
    //
    public function index(){
        $dossiers = DB::table('dossiers')->select('dossiers.type','dossiers.id as main_id','users.id', 'dossiers.file', 'dossiers.status', 'dossiers.name_dossier', 'dossiers.id_user', 'users.name')->join('users','users.id', '=', 'dossiers.id_user')->get();
        return view('./vendor/voyager/pages/browse',['dossiers'=>$dossiers]);
    }
    public function update(){
        DB::table('dossiers')->update(['status' => 1]);
        return view('./vendor/voyager/posts/browse');
    }
    public function deny($id){
        DB::table('dossiers')->where(['id' => $id])->update(['status' => 'refus']);
        return redirect('/admin/pages');
    }

    public function accept($id){
        DB::table('dossiers')->where(['id' => $id])->update(['status' => 'acceptee']);
        return redirect('/admin/pages');
    }

    public function delete($id){
        DB::table('dossiers')->delete($id);
        return redirect('/admin/pages');
    }
}
