@extends('layouts.index')

@section('content')

<!-- Begin Top Author Page
================================================== -->
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 col-md-offset-2">
			<div class="mainheading">
				<div class="row post-top-meta authorpage">
					<div class="col-md-10 col-xs-12">
						<h1>{{ Auth::user()->name }}</h1>
						<span class="author-description">Founder of <a target="_blank" href="https://www.wowthemes.net">WowThemes.net</a> and creator of <strong>"Mediumish"</strong> theme that you're currently previewing. I professionally develop premium themes, templates & scripts since the Apocalypse (2012). You can reach me out on the social links below.</span>
						<div class="sociallinks"><a  target="_blank" href="https://www.facebook.com/wowthemesnet/"><i class="fa fa-facebook"></i></a> <span class="dot"></span> <a target="_blank" href="https://plus.google.com/s/wowthemesnet/top"><i class="fa fa-google-plus"></i></a></div>
						<a target="_blank" href="https://twitter.com/wowthemesnet" class="btn follow">Follow</a>
					</div>
					<div class="col-md-2 col-xs-12">
						<img class="author-thumb" src="{{ url('default-photo.png') }}" alt="Sal">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Top Author Meta
================================================== -->

<!-- Begin Author Posts
================================================== -->
<div class="graybg authorpage">
	<div class="container">
		<div class="listrecent listrelated">

				<!-- begin post -->
				<div class="authorpostbox">
					@foreach($posts as $post)
		@foreach ($post->user()->get() as $users)
					<div class="card">
						<a href="author.html">
						<img class="img-fluid img-thumb" src="uploads/{{ $post->cover }}" alt="">
						</a>
						<div class="card-block">
							<h2 class="card-title"><a href="{{ route('show', $post) }}">{{ $post->judul}}</h4>
            	<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
									<a href="author.html"><img class="author-thumb" src="{{ url('default-photo.png') }}" alt="Sal"></a>
									</span>
									<span class="author-meta">
									<span class="post-name"><a href="author.html">{{ $users->name }}</a></span><br/>
									<span class="post-date">{{ $post->created_at }}</span><span class="dot"></span><span class="post-read">{{ $post->jenis }}</span>
									</span>
									<a class="float-right" class="btn btn-xs btn-danger" href="{{ route('edit', $post) }}">Edit</a>
									<button class="float-right" type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete{{$post->id}}">Hapus</button>
									@include('postdeletemodal')
									<span class="post-read-more"><a href="{{ route('show', $post) }}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<br>
					@endforeach
				</div>
				<!-- end post -->

				

		</div>
	</div>
</div>
<!-- End Author Posts
================================================== -->

@endsection