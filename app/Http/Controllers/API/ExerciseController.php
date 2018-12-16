<?php


namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Post;
use App\Exercise;
use  Validator ;
use Auth;


class ExerciseController extends BaseController  
{

public function index()
{
    # code...
    $exercises = Exercise::all();
    return $this->sendResponse($exercises->toArray(), 'Exercises read succesfully');
}


public function store(Request $request, Post $post)
{
    # code...
    $input = $request->all();
    $validator =    Validator::make($input, [
    'judul'=> 'required',
    'deskripsi'=> 'required',
    ] );

    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }

    // $post = Post::create($input);
    $post = $post->create([
            'user_id' => Auth::user()->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
    return $this->sendResponse($post->toArray(), 'Exercise created succesfully');
    
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
    'materi'=> 'required' 
    ] );

    if ($validator -> fails()) {
        # code...
        return $this->sendError('error validation', $validator->errors());
    }
    $post->judul =  $input['judul'];
    $post->materi =  $input['materi'];
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

