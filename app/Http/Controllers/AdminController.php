<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Category;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::all();
        $posts = Post::latest()->paginate(6);
        $countuser = User::count();
        $countpost = Post::count();
        $countcomment = Comment::count();

        return view('admin.adminindex', compact('comment','post', 'posts', 'countuser', 'countpost', 'countcomment'));
    }

    public function poststable()
    {
        $posts = Post::all();

        return view('admin.posttable', compact('posts'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('danger', 'Post Berhasil Dihapus');
    }

    public function commentstable()
    {
        $comments = Comment::all();
        $posts = Post::all();

        return view('admin.commentstable', compact('comments','posts'));
    }

    public function commentsdestroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back()->with('danger', 'Komentar Berhasil Dihapus');
    }

    public function userstable()
    {
        $comments = Comment::all();
        $posts = Post::all();
        $users = User::all();

        return view('admin.userstable', compact('comments','posts', 'users'));
    }

    public function usersdestroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('danger', 'User Berhasil Dihapus');
    }

    public function categoriestable()
    {
        $categories = Category::all();

        return view('admin.categoriestable', compact('categories'));
    }

    public function categorydestroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->back()->with('danger', 'Kategori Berhasil Dihapus');
    }

    public function updatekategori($id, Request $request)
    {
        $categories = Category::find($id);
        $categories->name = $request->input('kategori');
        $categories->save();

        return redirect()->back()->with('success', 'Kategori Berhasil Diedit');
    }

    public function storekategori(Request $request)
    {
        Category::create([
            'name' => request('name')
        ]);
        return redirect()->back()->with('success', 'Kategori Berhasil Ditambahkan');
    }
}