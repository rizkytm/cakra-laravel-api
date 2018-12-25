@extends('layouts.index')

@section('content')

<!-- Begin Site Title
================================================== -->
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">Cakra</h1>
		<p class="lead">
			 Cara Asyik Belajar Sastra
		</p>
	</div>
<!-- End Site Title
================================================== -->

	<!-- Begin List Posts
	================================================== -->
	<section class="recent-posts">
	<div class="section-title">
		<h2><span>Tulis Sastra</span></h2>
	</div>
	
	<form class="" action="{{ route('store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
	<div class="form-group has-feedback {{ $errors->has('judul') ? ' has-error' : '' }}">
		<label><strong>Judul</strong></label>
		<input class="form-control" name="judul" type="text" placeholder="Judul karya sastra" value="{{ old('judul') }}">
				@if ($errors->has('judul'))
                    <span class="help-block">
                        <p>{{ $errors->first('judul') }}</p>
                    </span>
                @endif
	</div>

	<div class="form-group has-feedback {{ $errors->has('jenis') ? ' has-error' : '' }}">
                <label for=""><strong>Jenis Sastra</strong></label>
                <select name="jenis" class="form-control">
                    <option value="Cerita Pendek">Cerita Pendek</option>
                    <option value="Puisi/Pantun">Puisi/Pantun</option>
                    <option value="Naskah Drama">Naskah Drama</option>
                </select>
            </div>

    <div class="form-group">
				<label for=""><strong>Gambar Cover</strong></label>
				<input id="cover" type="file" class="form-control{{ $errors->has('cover') ? ' is-invalid' : '' }}" name="cover">
				@if ($errors->has('cover'))
					<span class="help-block">
						<p>{{ $errors->first('cover') }}</p>
					</span>
				@endif
			</div>

    <div class="form-group has-feedback {{ $errors->has('isi') ? ' has-error' : '' }}">
                <label for=""><strong>Isi</strong></label>
                <textarea name="isi" rows="5" class="form-control" placeholder="Isi karya sastra">{{ old('isi') }}</textarea>
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
	
	</section>
	<!-- End List Posts
	================================================== -->

</div>
<!-- /.container -->

@endsection