<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Alert;

class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::id()){
            $post= Post::all();
            $usertype= Auth()->user()->usertype;
            if($usertype=='user'){
                return view('home.homepage',compact('post'));
            }else if($usertype=='admin'){
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }

    public function post(){
        return view('post');
    }

    public function homepage(){
        $post= Post::where('post_status','=', 'active')->get();
        return view('home.homepage', compact('post'));
    }
    public function PostDetails($id){
        $post = Post::find($id);
        return view('home.post_details', compact('post'));
    }

    public function CreatPost(){
       
        return view('home.creat_post');
    }

    public function AddPost(Request $request){

        $user=Auth()->user();
        $userid= $user->id;
        $name= $user->name;
        $usertype= $user->usertype;

        $post= new Post;
        $post->title= $request->title;
        $post->description= $request->description;

        $post->user_id = $userid;
        $post->name = $name;
        $post->usertype = $usertype;
        $post->post_status = 'Pending';

        $image = $request->image;
        if($image){
            $imagename = time().'.'. $image->getClientOriginalExtension();
            $request->image->move('postimage/',$imagename);
            $post->image= $imagename;
        }
        
        $post->save();
        Alert::success('Congrats','You have added data Successfully!');
        return redirect()->back();
    }

    public function MyPost(){
        $user=Auth::user();
        $userid= $user->id;

        $data= Post::where('user_id','=', $userid)->get();
        return view('home.my_post', compact('data'));
    }

    public function DeleteMyPost($id){
        $data = Post::find($id);
        $data->delete();
        
        return redirect()->back()->with('message','Data Deleted Successfully!');
    }

    public function UpdateMyPostView($id){
        $data = Post::find($id);
        return view('home.update_mypost', compact('data'));
    }

    public function UpdateMyPost(Request $request, $id){
        $data = Post::find($id);
        
        $data->title= $request->title;
        $data->description= $request->description;

        $image = $request->image;
        if($image){
            $imagename = time().'.'. $image->getClientOriginalExtension();
            $request->image->move('postimage/',$imagename);
            $data->image= $imagename;
        }
        
        $data->save();
        Alert::success('Congrats','Your Post Update Successfully!');
        return redirect()->back();
    }
}