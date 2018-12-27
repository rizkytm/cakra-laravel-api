<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Storage;

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
        $user = User::where('id', '=', Auth::user()->id)->get();
        return view('posts.profile', compact('posts', 'user'));
    }

    public function editpage(User $user)
    {
        $posts = Post::orderBy('created_at', 'desc')->where('user_id', '=', Auth::user()->id)->get();
        $user = User::where("id", "=", Auth::user()->id)->get();
        return view('posts.profileedit', compact('user', 'posts'));
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

    public function edit($id, Request $request)
    {
        $user = User::find($id);

        $this->validate(request(), [
            'avatar' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');

            $path = Storage::disk('public_uploads')->put('avatars', $avatar); 
            $user->update([
            'avatar' => $path
            ]);
        }

        return redirect()->route('profile')->with('success', 'Profil Berhasil Diperbarui');
    }

    public function destroy(User $user, Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if($request->user()->avatar)
        {
            Storage::disk('public_uploads')->delete($request->user()->avatar);
        }

        $request->user()->update([
            'avatar' => 'default-photo.png'
        ]);

        return redirect()->back();
    }
}
