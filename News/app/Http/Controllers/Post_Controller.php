<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\UploadedFile;


use App\Models\Post;
use App\Models\Category;
class Post_Controller extends Controller
{
    function index(Request $request){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $main = 'admin.post.main';
            $datas=Post::with('user','category')->orderBy('id','asc')->get();
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
        $listCate = Category::all();
        if(isset($ss)){
            $main = 'admin.post.form';
            return view('admin.index',[
                'main'=>$main,
                'nameModule'=>$request->segment(2),
                'nameVi'=>$this->changeNameModule($request->segment(2)),
                'ssId'=>$ss['id'],
                'category'=>$listCate

            ]);
        }else{
            return view('admin.Error403');
        }
    }
    function edit(Request $request,string $id){
        $ss = $request->session()->get('loginSession');
        $listCate = Category::all();
        if(isset($ss)){
            $main = 'admin.post.form';
            $row = Post::with('user','category')->where('id',$id)->first();
            return view('admin.index',[
                'main'=>$main,'row'=>$row,
                'nameModule'=>$request->segment(2),
                'nameVi'=>$this->changeNameModule($request->segment(2)),
                'ssId'=>$ss['id'],
                'category'=>$listCate
            ]);
        }else{
            return view('admin.Error403');
        }
    }
    function delete(Request $request){
        $ss = $request->session()->get('loginSession');

        if(isset($ss)){
            $id = $request->input('idDel');
            $post = Post::where('id',$id)->first();

            if(file_exists('public/img/'.$post->image)){
                unlink('public/img/'.$post->image);
            }
            $post->delete();
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
            $cate_id = $request->input('cate_id');
            $status =  $request->input('status');
            $images = $request->file('image');
            $checkName = Post::where('name',$name)->get();

            if($id==''){
                if(count($checkName)!=0){
                    return response()->json([
                        'msg'=> 'fail','error'=>$name.' đã tồn tại','id'=>$id]);
                }
                //them hinh anh cho phim


                if($images){
                    $get_name_image = $images->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image = $name_image.rand(0,999).'.'.$images->getClientOriginalExtension();
                    $images->move('public/img/',$new_image);

                    $image= $new_image;
                }




                $data = new Post;
                $data->name=$name;
                $data->slug=$slug;
                $data->description=$description;
                $data->user_id=$ss['id'];
                $data->category_id=$cate_id;
                $data->content=$content;
                $data->status=$status;
                $data->image=$image;

                $data->save();
                return response()->json([
                    'msg'=> 'ok','error'=>'','id'=>$id]);

            }else{

                $post= Post::find($id);
                $post->name = $request->input('name');
                $post->slug = $request->input('slug');
                $post->description = $request->input('description');
                $post->content=$content;
                $post->category_id=$cate_id;
                $post->status=$status;
                if($images){
                    if(file_exists('public/img/'.$post->image)){
                        unlink('public/img/'.$post->image);
                    }else{
                        $get_name_image = $images->getClientOriginalName();
                        $name_image = current(explode('.',$get_name_image));
                        $new_image = $name_image.rand(0,999).'.'.$images->getClientOriginalExtension();
                        $images->move('public/img/',$new_image);
                        $post->image= $new_image;
                    }

                }
                $post->save();

                return response()->json([
                    'msg'=> 'edit','error'=>'','id'=>$id]);

            }

        }else{
            return view('admin.Error403');
        }
    }
}
