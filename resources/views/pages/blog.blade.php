@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_responsive.css')}}">
<!-- Blog -->{{ asset('public/')}}

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						
						<!-- Blog post -->
						@foreach($post as $row)
						<div class="blog_post">
							<div class="blog_image" style="background-image:url({{ asset($row->post_image) }})"></div>
							<div class="blog_text">
								@if(Session::get('lang') == 'hindi')
									{{ $row->post_title_in }}
									<div class="blog_button"><a href="{{ url('blog/single/'.$row->id) }}">जारी रखें पढ़ रहे हैं</a></div>
									
								@else
									{{ $row->post_title_en }}
									<div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
								@endif
								
							</div>
							
							
						</div>
						@endforeach
						
					</div>
				</div>
					
			</div>
		</div>
	</div>

@endsection