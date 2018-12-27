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
					<div class="col-md-12 col-xs-12">
						
						<center>
							<h1>{{ Auth::user()->name }}</h1>
							<img class="author-thumb" src="{{ asset('uploads/'.Auth::user()->avatar) }}" alt="Sal">
							<br><br>
						
               
                   <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    	@foreach($user as $us)
                      <a href="{{ route('profile.editpage', $us) }}" class="btn btn-warning">Edit</a>
                      @endforeach
                    </div>
                  </div>
              </center>

                  
					</center>
				</div>
					<!-- <div class="col-md-2 col-xs-12">
						
					</div> -->
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
						<img class="img-fluid img-thumb" src="{{ asset('uploads/'.$post->cover) }}" alt="">
						</a>
						<div class="card-block">
							<h2 class="card-title"><a href="{{ route('show', $post) }}">{{ $post->judul}}</h4>
            	<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
									@if($users->name === Auth::user()->name)
										<a href="{{ route('profile') }}">
										@else
										<a href="{{ route('user', $users) }}">
										@endif
										<img class="author-thumb" src="{{ asset('uploads/'.Auth::user()->avatar) }}" alt="Sal"></a>
									</span>
									<span class="author-meta">
									<span class="post-name">
										@if($users->name === Auth::user()->name)
										<a href="{{ route('profile') }}">{{ $users->name }}</a>
										@else
										<a href="{{ route('user', $users) }}">{{ $users->name }}</a>
										@endif
									</span><br/>
									<span class="post-date">{{ $post->created_at }}</span><span class="dot"></span><span class="post-read">{{ $post->jenis }}</span>
									</span>
									<a class="float-right" class="btn btn-xs btn-danger" href="{{ route('edit', $post) }}">Edit</a>
									<button class="float-right" type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete{{$post->id}}">Hapus</button>
									@include('postdeletemodal')
									
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