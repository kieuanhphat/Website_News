<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\Models\Category;
use App\Models\Post;
class Category_Controller extends Controller
{
    function index(Request $request){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $main = 'admin.category.main';
            $datas=Category::with('user')->orderBy('id','asc')->get();


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
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $main = 'admin.category.form';
            return view('admin.index',[
                'main'=>$main,
                'nameModule'=>$request->segment(2),
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
            $main = 'admin.category.form';
            $row = Category::where('id',$id)->first();
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
            $id = $request->input('idDel');

            Post::whereIn('category_id',[$id])->delete();
            Category::find($id)->delete();
            return response()->json([
                'msg'=>'delete']);
        }else{
            return view('admin.Error403');
        }
    }
    function process(Request $request){

        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $id = $request->input('id');
            $slug = $request->input('slug');
            $name = $request->input('name');
            $description = $request->input('description');
            $content = $request->input('content');
            $status =  $request->input('status');

            $checkName = Category::where('name',$name)->get();

            if($id==''){
                if(count($checkName)!=0){
                    return response()->json([
                        'msg'=> 'fail','error'=>$name.' đã tồn tại','id'=>$id]);
                }

                $data = new Category;
                $data->name=$name;
                $data->slug=$slug;
                $data->description=$description;
                $data->content=$content;
                $data->status=$status;
                $data->user_id = $ss['id'];
                $data->save();
                return response()->json([
                    'msg'=> 'ok','error'=>'','id'=>$id]);

            }else{

                $cate= Category::find($id);
                $cate->name = $request->input('name');
                $cate->slug = $request->input('slug');
                $cate->description = $request->input('description');
                $cate->content=$content;
                $cate->status=$status;

                $cate->save();

                return response()->json([
                    'msg'=> 'edit','error'=>'','id'=>$id]);

            }

        }else{
            return view('admin.Error403');
        }
    }

}
