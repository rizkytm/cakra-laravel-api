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
						@foreach($user as $us)
						<form class="form-horizontal" action="{{ route('profile.edit', $us) }}" method="post" enctype="multipart/form-data">
                		{{ csrf_field() }}
						{{ method_field('PATCH') }}
						<center>
							<h1>{{ Auth::user()->name }}</h1>
							<img class="author-thumb" src="{{ asset('uploads/'.Auth::user()->avatar) }}" alt="Sal">
							<br><br>
						<div class="col-sm-6">
                    		<input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">

                   			 	@if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                    	</div>
                    	<br>
                   		<div class="col-sm-4">
                    			@if(auth()->user()->avatar != null)

                            	<a href=""
                            	class="btn btn-danger"
                            	onclick="event.preventDefault();
                            	document.getElementById('remove-avatar').submit();"
                            	>Hapus Avatar</a>

                            	@endif

                   		</div>
                   <br>
               
                   <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                  </div>
              </center>
              </form>

                  <form action="{{ route('avatar.delete', $us) }}" id="remove-avatar" method="POST">
                    	{{ csrf_field() }}
                    	{{ method_field('DELETE') }}
                    </form>
					</center>
				</div>
				@endforeach
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