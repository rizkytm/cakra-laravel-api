@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $post->judul}}
                    <a class="float-right" href="{{ route('edit', $post) }}">Edit</a>
                </div>

                <div class="card-body">
                    {{ $post->isi }}
                </div>
            </div><br>

                <div class="card">
                    <div class="card-header"><h4>Komentar</h4></div>

                    <div class="card-body">
                        @foreach($post->comment()->get() as $comment)
                            <h5>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}
                            <button class="float-right" type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete{{$comment->id}}">Hapus</button>
                            </h5>
                            @include('commentdeletemodal')
                            <p>{{ $comment->message }}</p>
                        @endforeach                 
                    
                        <form action="{{ route('comment', $post) }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
                            <textarea name="message" id="" rows="2" class="form-control" placeholder="Berikan komentar..."></textarea>
                            <br>
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </form>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row" style="height: 320px"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><br>

        </div>
    </div>
</div>
@endsection
