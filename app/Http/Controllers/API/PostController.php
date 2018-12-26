<?php


namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Post;
use App\Comment;
use  Validator ;
use Auth;


class PostController extends BaseController  
{

public function index()
{
    # code...
    $posts = Post::all();
    return $this->sendResponse($posts->toArray(), 'Posts read succesfully');
}


public function store(Request $request, Post $post)
{
    # code...
    $input = $request->all();
    $validator =    Validator::make($input, [
    'judul'=> 'required',
    'isi'=> 'required',
    'category_id'=> 'required',
    'cover' => 'nullable',
    'user_id' => 'required'
    ] );

    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }

    // if ($request->hasFile('cover'))
    // {
    //         // $cover = $request->file('cover');
    //         // // $path = Storage::putFileAs(
    //         // //     'avatars', $request->file('avatar'), $request->user()->id
    //         // // );
    //         // $filename = $cover->getClientOriginalName();
    //         // $path = Storage::disk('public_uploads')->put('covers', $filename); 
    //         $post = $post->create([
    //         'user_id' => $request->user_id,
    //         'judul' => $request->judul,
    //         'isi' => $request->isi,
    //         'cover' => $request->cover,
    //         'category_id' => $request->category_id
             
    //     ]);
    // }
    // else{
    //     // $post = Post::create($input);
    //     $post = $post->create([
    //         'user_id' => Auth::user()->id,
    //         'judul' => $request->judul,
    //         'isi' => $request->isi,
    //         'jenis' => $request->jenis,
    //         'cover'=> $request->cover
    //     ]);

    // }

    $post = $post->create([
            'user_id' => $request->user_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'category_id' => $request->category_id,
            'cover'=> $request->cover
        ]);

    return $this->sendResponse($post->toArray(), 'Post  created succesfully');
    
}






public function show(  $id)
{
    $post = Post::find($id);
    if (   is_null($post)   ) {
        # code...
        return $this->sendError(  'post not found ! ');
    }
    return $this->sendResponse($post->toArray(), 'Post read succesfully');
    
}



// update book 
public function update(Request $request , Post $post)
{
    $input = $request->all();
    $validator =    Validator::make($input, [
    'judul'=> 'required',
    'isi'=> 'required' 
    ] );

    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }
    $post->judul =  $input['judul'];
    $post->materi =  $input['isi'];
    $post->save();
    return $this->sendResponse($post->toArray(), 'Post  updated succesfully');
    
}





// delete book 
public function destroy(Post $post)
{
 
    $post->delete();

    return $this->sendResponse($post->toArray(), 'Post  deleted succesfully');
    
}



    
}

