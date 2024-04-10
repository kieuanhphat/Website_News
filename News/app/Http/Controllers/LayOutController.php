<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;
use DB;
class LayOutController extends Controller
{
    function index(Request $request){
        $slug_lv1 = $request->segment(1);
        $main ='layout.includes.main';
        $listCate = Category::select('name','slug')->orderBy('id','desc')->get();
        $posts = Post::with('category')->where('status',1)->paginate(6);
        $posts_hot=Post::with('category')->where('status',1)->orderBy('id','desc')->paginate(8);
        $posttrend=Post::with('category')->where('status',1)->orderBy(DB::raw('RAND()'))->first();
        $post2="";
        if($slug_lv1=='contact'){
            $main ='layout.includes.contact';
        }else{
            if($slug_lv1!=''){
                if(str_contains($slug_lv1,'.html')){

                    $posts = Post::with('category')->where('status',1)->where('slug',str_replace(".html","",$slug_lv1))->first();
                    $cate_id = $posts->category_id;
                    $post2 = Post::with('category')->where('status',1)->where('category_id',$cate_id)->orderBy(DB::raw('RAND()'))->whereNotIn('name',[$posts->name])->get();
                    $main ='layout.includes.post';
                }else{
                    if($slug_lv1=='all'){
                        $posts = Post::where('status',1)->get();
                        $main ='layout.includes.category';
                    }else{
                         $row = Category::where('slug',$slug_lv1)->get();
                    $id_cate = $row[0]->id;
                    $posts = Post::with('category')->where('status',1)->where('category_id',$id_cate)->get();
                    $main ='layout.includes.category';
                    }
                }
            }
        }
        return view('index',['main'=>$main,'listCate'=>$listCate,
        'posts'=>$posts,'slug_lv1'=>$slug_lv1,'posts_hot'=>$posts_hot,'post2'=>$post2,'posttrend'=>$posttrend]);
    }
}
