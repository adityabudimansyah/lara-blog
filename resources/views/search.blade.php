@extends('layouts.new_style.template')
@section('content')
<!-- <div class="container">
    <div class="single-top">
        <div class="category-blog-list">
            <h3>Search Results for "{{$search_str}}"</h3>
			<hr>
				@foreach($search_results as $post)
					<div class="might-grid">
						<div class="grid-might">
							<a href="{{route('post',['id'=>$post->id])}}"><img src="{{asset($post->featured_image->thumb)}}" class="img-responsive" alt=""> </a>
						</div>
						<div class="might-top">
							<h4><a href="{{route('post',['id'=>$post->id])}}">{{$post->title}}</a></h4>
							<p>{!!str_limit($post->content,280)!!}</p> 
						</div>
						<div class="clearfix"></div>
					</div>
				@endforeach	
				<div class="text-center">
					{{ $search_results->appends(['search_str'=>Request::get('search_str')])->links()}}
				</div>
		</div>
    </div>
</div> -->
  <main id="main">
    <section id="blog" class="blog">
      <div class="container" >
        <div class="row g-5">
          <div class="col-lg-8">
            <div class="row gy-5 posts-list mt-4">
             <h3>Search Results for "{{$search_str}}"</h3>
            @foreach($search_results as $post)
                 <div class="col-lg-6">
                <article class="d-flex flex-column">
                  <div class="post-img">
                    <a href="{{ route('post', $post->slug) }}">
                        <img src="{{asset($post->featured_image->thumb)}}" alt="" class="img-fluid">
                    </a>
                  </div>
                  <h2 class="title">
                    <a href="{{ route('post', $post->slug) }}">{{$post->title}}</a>
                  </h2>
                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"> <i class="bi bi-person"></i><a href="{{ route('post', $post->slug) }}">By {{$post->user->name}}</a></li>
                      <li class="d-flex align-items-center"> <i class="bi bi-clock"></i><a href="{{ route('post', $post->slug) }}"><time datetime="2022-01-01">{{$post->created_at->diffForHumans()}}</time></a></li>
                    </ul>
                  </div>
                  <div class="content">
                    <p>
                        {!!str_limit($post->content,280)!!}
                    </p>
                  </div>
                  <div class="read-more mt-auto align-self-end">
                    <a href="{{ route('post', $post->slug) }}">Read More <i class="bi bi-arrow-right"></i></a>
                  </div>
                </article>
              </div>
            @endforeach
			<div class="text-center">
				{{ $search_results->appends(['search_str'=>Request::get('search_str')])->links()}}
			</div>
            </div><!-- End blog posts list -->
          </div>

          <div class="col-lg-4">
            <div class="sidebar ps-lg-4 mt-5">
              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                 {{Form::open(['url'=>route('blog.search'),'method'=>'get', 'class'=>'mt-3'])}}
                 {{Form::text('search_str',null,[])}}
                  <button type="submit"><i class="bi bi-search"></i></button>
                {{Form::close()}}
              </div><!-- End sidebar search formn-->
            </div><!-- End Blog Sidebar -->
          </div>
        </div>
      </div>
    </section><!-- End Blog Section -->
</main>
@endsection