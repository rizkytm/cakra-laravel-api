@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit post</div>

                <div class="card-body">
            <form class="" action="{{ route('update', $post) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group has-feedback {{ $errors->has('judul') ? ' has-error' : '' }}">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="judul" placeholder="Post Title" value="{{ $post->judul }}">
                @if ($errors->has('judul'))
                    <span class="help-block">
                        <p>{{ $errors->first('judul') }}</p>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('jenis') ? ' has-error' : '' }}">
                <label for="">Jenis Sastra</label>
                <select name="jenis" class="form-control">                    
                    <option value="Cerita Pendek"
                    @if($post->jenis === "Cerita Pendek")
                        selected
                    @endif
                        >Cerita Pendek</option>
                    <option value="Puisi/Pantun"
                    @if($post->jenis === "Puisi/Pantun")
                        selected
                    @endif>Puisi/Pantun</option>
                    <option value="Naskah Drama"
                    @if($post->jenis === "Naskah Drama")
                        selected
                    @endif>Naskah Drama</option>
                </select>
            </div>         
            
            <div class="form-group has-feedback {{ $errors->has('isi') ? ' has-error' : '' }}">
                <label for="">Materi</label>
                <textarea name="isi" rows="5" class="form-control" placeholder="Post Content">{{ $post->isi }}</textarea>
                @if ($errors->has('isi'))
                    <span class="help-block">
                        <p>{{ $errors->first('isi') }}</p>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
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
            </div>
        </div>
    </div>
</div>
@endsection
