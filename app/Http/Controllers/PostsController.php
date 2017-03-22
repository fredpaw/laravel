<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {

//        $posts = $posts->all();


        $posts = Post::latest()
            ->filter(request(['month','year']))
            ->get();

//        $posts = Post::latest();
//        if($month = request('month')){
//            $posts->whereMonth('created_at',Carbon::parse($month)->month);// March = 3, May = 5
//        }
//        if($year = request('year')){
//            $posts->whereYear('created_at',$year);
//        }
//        $posts = $posts->get();


        return view('posts.index',compact('posts'));
    }

//    public function show($id)
//    {
//        $post = Post::find($id);
//        return view('posts.show',compact('post'));
//    }

    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
//        Create a new post using the request data
//        $post = new Post;
//        $post->title = request('title');
//        $post->body = request('body');
////        Save it to the database
//        $post->save();
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required',
        ]);
//        Post::create(request(['title','body']));

        auth()->user()->publish(
            new Post(request(['title','body']))
        );

//        Post::create([
//            'title' => request('title'),
//            'body' => request('body'),
//            'user_id' => auth()->id(),
//        ]);

//        And then redirect to the home page.
        return redirect('/');
    }
}
