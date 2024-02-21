<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addPost(){
        return view('admin.add_post');
    }

    public function InsertPostDb(Request $request){
        $user=Auth()->user();
        $userid= $user->id;
        $name= $user->name;
        $usertype= $user->usertype;

        $post= new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype = $usertype;

        $image = $request->image;

        if($image){
            
            $imagename= time().'.'. $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->Save();
        return redirect()->back()->with('message','Post added successfully!');

    }

    public function PostList(){
        $post = Post::all();
        return view('admin.post_list',compact('post'));
    }

    public function PostDelete($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Delete successfully!');
    }

    public function PostShow($id){
        $post = Post::find($id);
        return view('admin.post_update',compact('post'));
    }
    public function PostUpdate(Request $request, $id){
        $post = Post::find($id);

        $post->title = $request->title;
        $post->description = $request->description;
        $image = $request->image;

        if($image){
            
            $imagename= time().'.'. $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();
        return redirect()->back()->with('message','Post Update successfully!');
        
    }

    public function PostAccept($id){
        $post= Post::find($id);

        $post->post_status='active';
        $post->save();
        return redirect()->back();
    }
    public function PostReject($id){
        $post= Post::find($id);

        $post->post_status='rejected';
        $post->save();
        return redirect()->back();
    }
}
