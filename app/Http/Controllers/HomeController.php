<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', '=', Auth::user()->id)->get();
        return view('posts.profile', compact('posts'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search');
        $hasil = Post::where('judul', 'LIKE', '%' . $query . '%')->paginate(6);

        return view('posts.search', compact('hasil', 'query'));
    }

    public function user(User $user)
    {
        $users = User::all();
        $posts = Post::where("user_id", "=", $user->id)->get();
        return view('posts.user', compact('posts','users','user'));
    }
}
