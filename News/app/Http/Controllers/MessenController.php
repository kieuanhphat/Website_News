<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messenge;
use App\Models\User;
class MessenController extends Controller
{
    function index(Request $request){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $main = 'admin.mess.main';
            $datas= Messenge::get();
            return view('admin.index',[
                'main'=>$main,
                'datas'=>$datas,
                'nameModule'=>$request->segment(2),
                'nameVi'=>$this->changeNameModule($request->segment(2)),
                'ssId'=>$ss['id']
            ]);
        }else{
            return view('admin.Error403');
        }
    }
    function add(Request $request){
            // echo 1;die;
            $name = $request->input('name');
            $message = $request->input('message');
            $email = $request->input('email');
            $user = User::where('email',$email)->get();
            if(count($user)!=0){
                $status=1;
            }else{
                $status=0;
            }
                $data = new Messenge;

                $data->name=$name;
                $data->message=$message;
                $data->email=$email;
                $data->status=$status;
                $data->save();
                return response()->json([
                        'msg'=> 'ok']);


    }

}
