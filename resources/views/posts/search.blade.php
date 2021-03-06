@extends('layouts.index')

@section('content')

<!-- Begin Site Title
================================================== -->
<div class="container">
	@if(count($hasil))
	<div class="mainheading">
		<h1 class="sitetitle">Search</h1>
		<p class="lead">
			 Hasil Pencarian : {{ $query }}
		</p>
	</div>
<!-- End Site Title
================================================== -->

	<!-- Begin List Posts
	================================================== -->
	<section class="recent-posts">
	<div class="section-title">
		<h2><span>Results</span></h2>
	</div>
	<div class="card-columns listrecent">

		<!-- begin post -->
		@foreach($hasil as $post)
		@foreach ($post->user()->get() as $users)
		<div class="card">
			<a href="{{ route('show', $post) }}">
				<img class="card-img-top  mx-auto d-block" src="uploads/{{ $post->cover }}" alt="" height="240px" width="350px">
			</a>
			<div class="card-block">
				<h2 class="card-title"><a href="{{ route('show', $post) }}">{{ $post->judul}}</a></h2>
				<h4 class="card-text">{{ str_limit($post->isi, 120, ' ...') }}</h4>
				<div class="metafooter">
					<div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="author.html"><img class="author-thumb" src="{{ url('default-photo.png') }}" alt="Avatar"></a>
						</span>
						<span class="author-meta">
						<span class="post-name"><a href="author.html">{{ $users->name }}</a></span><br/>
						<span class="post-date">{{ $post->created_at }}</span><span class="dot"></span><span class="post-read">{{ $post->jenis }}</span>
						</span>
						<span class="post-read-more"><a href="{{ route('show', $post) }}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@endforeach
		<!-- end post -->
		
	</div>
	</section>
	<div class="row justify-content-center">
		<center>{!! $hasil->render() !!}</center>
	</div>
	<!-- End List Posts
	================================================== -->

	@else

	<div class="mainheading">
		<h1 class="sitetitle">Search</h1>
		<p class="lead">
			 Hasil Pencarian "{{ $query }}" Tidak Ditemukan
		</p>
	</div>

	@endif

</div>
<!-- /.container -->

@endsection