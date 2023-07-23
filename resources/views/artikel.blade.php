@extends('layouts.new_style.template')
@section('content')
    <!--about-starts-->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('images/blog-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">
        <h2>Article</h2>
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Article</li>
        </ol>
      </div>
    </div>

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" >
        <div class="row g-5">
          <div class="col-lg-8">
            <div class="row gy-5 posts-list">
             
            @foreach ($recent_posts as $recent_post)
                 <div class="col-lg-6">
                <article class="d-flex flex-column">
                  <div class="post-img">
                    <a href="{{ route('post', $recent_post->slug) }}">
                        <img src="{{asset($recent_post->featured_image->thumb)}}" alt="" class="img-fluid">
                    </a>
                  </div>
                  <h2 class="title">
                    <a href="{{ route('post', $recent_post->slug) }}">{{$recent_post->title}}</a>
                  </h2>
                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"> <i class="bi bi-person"></i> <a href="{{ route('post', $recent_post->slug) }}">By {{$recent_post->user->name}}</a></li>
                      <li class="d-flex align-items-center"> <i class="bi bi-clock"></i><a href="{{ route('post', $recent_post->slug) }}"><time datetime="2022-01-01">{{$recent_post->created_at->diffForHumans()}}</time></a></li>
                    </ul>
                  </div>
                  <div class="content">
                    <p>
                        {!!str_limit($recent_post->content,280)!!}
                    </p>
                  </div>
                  <div class="read-more mt-auto align-self-end">
                    <a href="{{ route('post', $recent_post->slug) }}">Read More <i class="bi bi-arrow-right"></i></a>
                  </div>
                </article>
              </div>
            @endforeach
            </div><!-- End blog posts list -->
          </div>

          <div class="col-lg-4">
            <div class="sidebar ps-lg-4">
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
  </main><!-- End #main -->
@endsection
