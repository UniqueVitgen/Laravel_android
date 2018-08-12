<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index(Post $postModel) {
//        $posts = Post::all();
//        $posts = Post::latest('id')->get();
//        $posts = Post::latest('published_at')->get();
        $posts = $postModel->getPublishedPosts();
        return view('post.index', ['posts' => $posts]);
    }

    public function getLogout()
    {
        //dd($request);
        echo 'hello';
//        Auth::logout(); // log the user out of our application
//        return Redirect::to('auth.create'); // redirect the user to the login screen
    }

    public function unpublished(Post $postModel) {
        $posts = $postModel->getUnPublishedPosts();
        return view('post.index', ['posts' => $posts]);
    }

    public function create() {
        return view("post.create");
    }

    public function store(Post $postModel, Request $request) {
        //dd($request->all());
        $postModel->create($request->all());
        return redirect()->route('posts');
    }
}
