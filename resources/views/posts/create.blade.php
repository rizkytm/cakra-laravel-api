@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Buat post</div>

                <div class="card-body">
            <form class="" action="{{ route('store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('judul') ? ' has-error' : '' }}">
                <label for="">Judul</label>
                <input type="text" class="form-control" name="judul" placeholder="Post Title" value="{{ old('judul') }}">
                @if ($errors->has('judul'))
                    <span class="help-block">
                        <p>{{ $errors->first('judul') }}</p>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('jenis') ? ' has-error' : '' }}">
                <label for="">Jenis Sastra</label>
                <select name="jenis" class="form-control">
                    <option value="Cerita Pendek">Cerita Pendek</option>
                    <option value="Puisi/Pantun">Puisi/Pantun</option>
                    <option value="Naskah Drama">Naskah Drama</option>
                </select>
            </div>         
            
            <div class="form-group has-feedback {{ $errors->has('isi') ? ' has-error' : '' }}">
                <label for="">Materi</label>
                <textarea name="isi" rows="5" class="form-control" placeholder="Post Content">{{ old('isi') }}</textarea>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
