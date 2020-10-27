<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function postblog(Request $request){

        $blogs=new blog();

        $expl=explode(',',$request->image);
        $decode=base64_decode( $expl[1]);
        if(str_contains($expl[0],'png')){
            $exte='png';
        }
        else{
            $exte='jpg';
        }
        $currenttime=Carbon::now()->timestamp;
        $filename= $currenttime.'.'.$exte;
        $filepath=public_path().'/'. $filename;
        file_put_contents( $filepath,$decode);

        $blogs->title=$request->input('title');
        $blogs->content=$request->input('content');
        $blogs->image= $filename;
        $blogs->save();
        return response()->json(['message'=>$blogs],201);
    }

    public function getblogs(){
        $blogs=blog::all();
        return response()->json(['alliblogs'=>$blogs],200);
    }
    public function getblog($id){
       
        $blog=blog::find($id);
        return response()->json(['blog'=>$blog],200);
    }

    public function editblog(Request $request,$id){
        $blog=blog::find($id);
        if(!$blog){
            return response()->json(['message'=>"blog is not found"],404);
        }
    
            $blog->title=$request->input('title');
            $blog->content=$request->input('content');
            $blog->save();
            return response()->json(['message'=> $blog],200);

    }

    public function deleteblog($id){
             $blog=blog::find($id);
             if(!$blog){
                return response()->json(['message'=>"item is not found"],404);
            }
    
            $blog->delete();
            return response()->json(['message'=>"item is deleted"],201);
    }
}
