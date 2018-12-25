@extends('layouts.index')

@section('content')

<!-- Begin Article
================================================== -->
<div class="container">
	<div class="row">

		<!-- Begin Fixed Left Share -->
		<div class="col-md-2 col-xs-12">
			<div class="share">
				
			</div>
		</div>
		<!-- End Fixed Left Share -->

		<!-- Begin Post -->
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="mainheading">

				<!-- Begin Top Meta -->
				<div class="row post-top-meta">
					<div class="col-md-2">
						<a href="author.html"><img class="author-thumb" src="{{ url('default-photo.png') }}" alt="Avatar"></a>
					</div>
					<div class="col-md-10">
						<a class="link-dark" href="author.html">Sal</a><!-- <a href="#" class="btn follow">Follow</a> -->
						
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
					</div>
				</div>
				<!-- End Top Menta -->

				<h1 class="posttitle">{{ $post->judul }}</h1>

			</div>

			<!-- Begin Featured Image -->
			<img class="featured-image img-fluid" src="template/assets/img/demopic/10.jpg" alt="">
			<!-- End Featured Image -->

			<!-- Begin Post Content -->
			<div class="article-post">
				{!! nl2br(e($post->isi)) !!}
			</div>
			<!-- End Post Content -->

		</div>
		<!-- End Post -->

	</div>
</div>
<!-- End Article
================================================== -->

<div class="hideshare"></div>


@endsection