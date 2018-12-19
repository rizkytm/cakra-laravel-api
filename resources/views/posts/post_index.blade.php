@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="card">

                <div class="card-header">
                    <a href="{{ route('show', $post) }}">
                        {{ $post->judul}} | {{ $post->jenis }}
                    </a>
                    <button class="float-right" type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete">Hapus</button>
                </div>

                <div class="card-body">
                    {{ $post->isi }}
                </div>
            </div>
            <br>
            @include('postdeletemodal')
            @endforeach            
        </div>
    </div>
</div>
@endsection
