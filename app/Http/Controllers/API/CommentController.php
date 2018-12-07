<?php


namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Post;
use App\Comment;
use  Validator ;
use Auth;


class CommentController extends BaseController  
{

public function index()
{
    # code...
    // $posts = Post::all();
    // return $this->sendResponse($posts->toArray(), 'Posts read succesfully');
}


public function store(Request $request)
{
    # code...
    $input = $request->all();
    // $validator =    Validator::make($input, [
    // 'judul'=> 'required',
    // 'materi'=> 'required' 
    // ] );

    // if ($validator -> fails()) {
    //     # code...
    //     return $this->sendError('error validation', $validator->errors());
    // }

    // $post = Post::create($input);
    $comment = Comment::create([
            'post_id' => $request->post_id,
            // 'user_id' => Auth::user()->id,
            'user_id' => $request->user_id,
            'message' => $request->message
        ]);
    return $this->sendResponse($comment->toArray(), 'Comment  created succesfully');
    
}






public function show(  $id)
{
    $comment = Comment::find($id);
    if (   is_null($comment)   ) {
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

