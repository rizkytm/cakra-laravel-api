@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-md-offset-2">
				<div class="card">
                	<div class="card-header">Edit Post</div>

		                <div class="card-body">
		                    <form class="" action="{{ route('postadmin.update', $post) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" class="form-control" name="title" placeholder="Post Title" value="{{ $post->title }}">
							</div>
							
							<div class="form-group">
								<label for="">Category</label>
								<select name="category_id" id="" class="form-control">
									@foreach ($categories as $category)
										<option
											value="{{ $category->id }}"
											@if($category->id === $post->category_id)
												selected
											@endif
										>
										{{ $category->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="">Content</label>
								<textarea name="content" rows="5" class="form-control" placeholder="Post Content">{{ $post->content }}</textarea>
							</div>

							<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
							    <a class="nav-link active" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="true">Video</a>
							</li>
							<li class="nav-item">
							    <a class="nav-link" id="pdf-tab" data-toggle="tab" href="#pdf" role="tab" aria-controls="pdf" aria-selected="false">PDF</a>
							</li>
						</ul>
						<!-- Ini Konten video + deskripsi -->
						<div class="tab-content" id="myTabContent">
							<!-- Di sini konten video + deskripsi-->
							<div class="tab-pane fade show active" id="video" role="tabpanel" aria-labelledby="video-tab">
								<div class="row">	
									<div class="col-8">
										<br>
										<video width="100%" height="90%" controls>
											<source src="../../storage/{{ $post->video }}" type="video/mp4">
											Your browser does not support the video tag.
										</video>
										
									</div>
									<div class="col-4"><br>
						  				<div class="card bg-light mb-3" style="max-width: 18rem;">
						  					<div class="card-header">
							  					@foreach($post->user()->get() as $users)
			                						<strong>{{ $users->name }}</strong><br>
			                						<small>{{ $post->category->name }}</small>
		            							@endforeach
		            						</div>
										  	<div class="card-body">
										    	<p class="card-text">{{ $post->content }}</p>
										  	</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Di sini konten pdf & deskripsi -->
							<div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="pdf-tab">
						  		<div class="row">
						  			<div class="col-8">
						  				<br>
						  				<object width="100%" height="480" data="../../storage/{{ $post->pdf }}"></object>
						  			</div>
						  			<div class="col-4"><br>
						  				<div class="card bg-light mb-3" style="max-width: 18rem;">
						  					<div class="card-header">
							  					@foreach($post->user()->get() as $users)
			                						<strong>{{ $users->name }}</strong><br>
			                						<small>{{ $post->category->name }}</small>
		            							@endforeach
		            						</div>
										  	<div class="card-body">
										    	<p class="card-text">{{ $post->content }}</p>
										  	</div>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Save">
							</div>
							</form>
                		</div>
            	</div><br>
				
			</div>
		</div>
	</div>
@endsection