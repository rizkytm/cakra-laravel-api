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
					@foreach ($post->user()->get() as $users)
					<div class="col-md-10">
						@if($users->name === Auth::user()->name)
							<a href="{{ route('profile') }}">{{ $users->name }}</a>
							@else
							<a href="{{ route('user', $users) }}">{{ $users->name }}</a>
							@endif
						
						<span class="post-date">{{ $post->created_at }}</span><span class="dot"></span><span class="post-read">{{ $post->category->name }}</span>
					</div>
					@endforeach
				</div>
				<!-- End Top Menta -->

				<h1 class="posttitle">{{ $post->judul }}</h1>

			</div>

			<!-- Begin Featured Image -->
			<img class="featured-image img-fluid" src="../uploads/{{ $post->cover }}" alt="">
			<!-- End Featured Image -->

			<!-- Begin Post Content -->
			<div class="article-post">
				{!! nl2br(e($post->isi)) !!}
			</div>
			<!-- End Post Content -->
			
		<div class="section-title">
			<br><br><br>
			<h6>{{ $countlikes }} suka
				@if($ceklike === 1)
				<form class="" action="{{ route('dislike', $post) }}" method="post">
            		{{ csrf_field() }}
            		{{method_field('delete')}}            		
					<button class="float-right" type="submit" class="btn btn-xs btn-danger">Tidak Suka</button>
				</form>
				@else
				<form class="" action="{{ route('like', $post) }}" method="post">
            		{{ csrf_field() }}            		
					<button class="float-right" type="submit" class="btn btn-xs btn-danger">Suka</button>
				</form>
				@endif
			</h6>
				<h2><span>Komentar</span>
			</h2>

		</div>

		@foreach($post->comment()->get() as $comment)
                            <h5>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}
                            @if($comment->user_id === Auth::user()->id)
                            <button class="float-right" type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete{{$comment->id}}">Hapus</button>
                            </h5>
                            @else
                            
                            @endif
                            @include('commentdeletemodal')
                            <p>{{ $comment->message }}</p>
                        @endforeach

		<form action="{{ route('comment', $post) }}" method="post" class="form-horizontal">
                            {{ csrf_field() }}
		
                <textarea name="message" id="" rows="2" class="form-control" placeholder="Berikan komentar..."></textarea>
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
           </form>

		</div>
		<!-- End Post -->
		
		
	</div>

	

</div>
<!-- End Article
================================================== -->

<div class="hideshare"></div>


@endsection