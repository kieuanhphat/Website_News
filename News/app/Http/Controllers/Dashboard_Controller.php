<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class Dashboard_Controller extends Controller
{
    function index(Request $request){
        $ss = $request->session()->get('loginSession');


        if(isset($ss)){
            $main = 'admin.includes.main';
            return view('admin.index',[
                'main'=>$main,'nameModule'=>$request->segment(2),
                'nameVi'=>$this->changeNameModule($request->segment(2)),
                'ssId'=>$ss['id']
            ]);
        }else{
            return view('admin.Error403');
        }
    }
}
