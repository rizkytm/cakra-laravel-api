<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;
use App\Like;
use Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);

        return view('posts.post', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
    	return view('posts.write', compact('categories'));
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'judul' => 'required',
    		'isi' => 'required|min:10',
            'cover' => 'nullable|mimes:jpg,png,jpeg'
    	]);

        if($request->hasFile('cover'))
        {
            $cover = $request->file('cover');
            $filename = $cover->getClientOriginalName();
            $path = Storage::disk('public_uploads')->put('covers', $cover);
            Post::create([
            'judul' => request('judul'),
            'isi' => request('isi'),    
            'user_id' => auth()->id(),
            'category_id' => request('category_id'),
            'cover' => $path
            ]);
        }
        else
        {
            Post::create([
            'judul' => request('judul'),
            'isi' => request('isi'),    
            'user_id' => auth()->id(),
            'category_id' => request('category_id'),
            ]);
        }
    	
    	return redirect()->route('beranda')->with('success', 'Post Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $countlikes = Like::where("post_id", $id)->count();
        $ceklike = Like::where("post_id", $id)->where("user_id", auth()->id())->count();

        return view('posts.show', compact('post', 'countlikes', 'ceklike'));
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
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);

        $this->validate(request(), [
            'judul' => 'required',
            'isi' => 'required|min:10',
            'cover' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if($request->hasFile('cover'))
        {
            $cover = $request->file('cover');
            $filename = $cover->getClientOriginalName();
            $path = Storage::disk('public_uploads')->put('covers', $cover);
            $post->update([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'category_id' => request('category_id'),
            'cover' => $path
            ]);
        }
        else
        {
            $post->update([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'category_id' => request('category_id')
            ]);
        }

        

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

    public function like($id, Request $request)
    {
        $post = Post::find($id);
        $pid = $post->id;
        Like::create([
            'post_id' => $pid,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back();
    }

    public function dislike($id)
    {
        $like = Like::where("post_id", $id)->where("user_id", auth()->id())->delete();

        

        return redirect()->back();
    }
}
