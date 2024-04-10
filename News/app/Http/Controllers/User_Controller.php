<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class User_Controller extends Controller
{
    function index(Request $request){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $datas=User::orderBy('id','asc')->get();
            $main = 'admin.user.main';
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
    function login(){
        return view('admin.login');
    }

    function processLogin(Request $request){
        $email = $request->input('email');
        $pass = $request->input('password');
        $user = User::where('email',$email)->where('password',$pass)->first();
        if($user!=NULL){
            $request->session()->put('loginSession',[
                'id'=>$user->id,
                'email'=>$user->email
            ]);
            return redirect('/admin/dashboard');
        }else{
            return redirect('/login');
        }
    }

    function createSession(Request $request){
        $request->session()->put('loginSession','Hello');

        echo 'Da Tao Session';
    }
    function getSession(Request $request){
        $value =  $request->session()->get('loginSession');
        echo 'Gia Tri Session da tao '.$value;
    }
    function deleteSession(Request $request){
        $request->session()->forget('loginSession');
        echo 'Da Xoa Session';
    }

    function logout(Request $request){
        $request->session()->forget('loginSession');
        return redirect('/login');
    }

    function add(Request $request){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $main = 'admin.user.form';
            return view('admin.index',[
                'main'=>$main, 'nameModule'=>$request->segment(2),
                'nameVi'=>$this->changeNameModule($request->segment(2)),
                'ssId'=>$ss['id']
            ]);
        }else{
            return view('admin.Error403');
        }
    }
    function edit(Request $request,string $id){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $row = User::where('id',$id)->first();
            $main = 'admin.user.form';
            return view('admin.index',[
                'main'=>$main,'row'=>$row,
                'nameModule'=>$request->segment(2),
                'nameVi'=>$this->changeNameModule($request->segment(2)),
                'ssId'=>$ss['id']
            ]);
        }else{
            return view('admin.Error403');
        }
    }
    function delete(Request $request){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $user= User::where('id',$ss['id'])->first();
            $userID=$user->id;
            $id = $request->input('idDel');

            if($userID!=$id){
                Post::whereIn('user_id',[$id])->delete();
                Category::whereIn('user_id',[$id])->delete();
                User::where('id',$id)->delete();
                return response()->json([
                    'msg'=>'delete']);
            }else{
                return response()->json([
                    'msg'=>'fail']);
            }
        }else{
            return view('admin.Error403');
        }
    }
    function process(Request $request){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $id = $request->input('id');
            $email = $request->input('email');
            //check email
            $checkEmail = User::where('email',$email)->get();
            if($id==''){
                if(count($checkEmail)!=0){
                    return response()->json([
                        'msg'=> 'fail','error'=>'Email đã tồn tại','id'=>$id]);
                }

                $name = $request->input('name');

                $pass = $request->input('password');

                $user = new User;
                $user->name=$name;
                $user->email=$email;
                $user->password=$pass;

                $user->save();
                return response()->json([
                    'msg'=> 'ok','error'=>'','id'=>$id]);

            }else{
                $name = $request->input('name');
                $email = $request->input('email');
                User::find($id)->update(['name'=>$name,'email'=>$email]);
                return response()->json([
                    'msg'=> 'edit','error'=>'','id'=>$id]);
            }

        }else{
            return view('admin.Error403');
        }
    }
    function changePass(Request $request){
        $ss = $request->session()->get('loginSession');
        if(isset($ss)){
            $id = $request->input('idPass');
            $pass = $request->input('newPass');
            User::find($id)->update(['password'=>$pass]);
            return response()->json([
                'msg'=> 'change','id'=>$id,'pass'=>$pass]);
        }else{
            return view('admin.Error403');
        }

    }
}
