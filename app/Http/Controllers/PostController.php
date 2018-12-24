<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.post', compact('posts'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'judul' => 'required',
    		'isi' => 'required|min:10',
    	]);

    	Post::create([
    		'judul' => request('judul'),
    		'isi' => request('isi'),	
    		'user_id' => auth()->id(),
    		'jenis' => request('jenis')
    	]);
    	
    	return redirect()->route('beranda')->with('success', 'Post Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.post_show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('danger', 'Post Berhasil Dihapus');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.post_edit', compact('post'));
    }

    public function update($id)
    {
        $post = Post::find($id);

        $post->update([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'jenis' => request('jenis')
        ]);

        return redirect()->route('show', $post)->with('info', 'Post Berhasil Diedit');
    }

    public function comment($id, Request $request)
    {
        $post = Post::find($id);
        $pid = $post->id;
        Comment::create([
            'post_id' => $pid,
            'user_id' => auth()->id(),
            'message' => request('message')
        ]);

        return redirect()->back();
    }

    public function delcom($id)
    {
        $com = Comment::find($id);
        $com->delete();

        return redirect()->back();
    }
}
