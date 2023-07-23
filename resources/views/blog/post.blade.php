@extends('layouts.new_style.template')
@section('content')
    <!-- <div class="single">
        <div class="container">
            <div class="single-top">
                <a href="#"><img class="img-responsive" src="{{ asset($post->featured_image->original) }}"></a>
                <div class=" single-grid">
                    <h4>{{$post->title}}</h4>
                    <ul class="blog-ic">
                        <li><a href="#"><span> <i class="glyphicon glyphicon-user"> </i>{{$post->user->name}}</span>
                            </a></li>
                        <li><span><i class="glyphicon glyphicon-time"> </i>{{$post->created_at->diffForHumans()}}</span>
                        </li>
                        {{--  <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:145</span></li> --}}
                    </ul>
                    <p>{!!$post->content!!}</p>
                </div>
                <div class="comment-bottom heading">
                    <h3>Leave a Comment</h3>
                    @include('includes.alerts')
                    {{-- <form> --}}
                    {{Form::open(['url'=>'blog/post/'.$post->id.'/save-comment','method'=>'POST'])}}
                    {{-- <input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}"> --}}
                    {{Form::text('user_name',null,["placeholder"=>"Name"])}}
                    {{--  <input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}"> --}}
                    {{Form::text('user_email',null,["placeholder"=>"Email"])}}
                    {{-- <textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea> --}}
                    {{Form::textarea('content',null,["cols"=>"77","row"=>"6","placeholder"=>"Comment"])}}
                    <input type="submit" value="Send">
                    {{Form::close()}}
                    {{-- </form> --}}
                </div>
                <div class="comments heading">
                    <h3>Comments</h3>
                    @foreach($post->comments as $comment)
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->user_name}}</h4>
                                <p>{{$comment->content}} </p>
                            </div>
                            <div class="media-right">
                                <a href="#">
                                    <img src="images/si.png" alt=""> </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> -->

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('/images/blog-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Article Details</h2>
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ url('artikel') }}">Article</a></li>
          <li>Article Details</li>
        </ol>
        
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-12">
            <article class="blog-details">
              <div class="post-img">
                <img src="{{ asset($post->featured_image->original) }}" alt="" class="img-fluid">
              </div>
              <h2 class="title">{{$post->title}}</h2>
              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"> <i class="bi bi-person"></i><a href="blog-details.html">By {{$post->user->name}}</a></li>
                  <li class="d-flex align-items-center"> <i class="bi bi-clock"></i><a href="blog-details.html"><time datetime="2020-01-01">{{$post->created_at->diffForHumans()}}</time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p>
                  {!!$post->content!!}
                </p>
              </div><!-- End post content -->
            </article><!-- End blog post -->

            <div class="comments">
              <h4 class="comments-count">Comments</h4>
              @foreach($post->comments as $comment)
                <div id="comment-1" class="comment">
                    <div class="d-flex">
                    <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                    <div>
                        <h5><a href="">{{$comment->user_name}}</a></h5>
                        <time datetime="2020-01-01">{{$comment->created_at->diffForHumans()}}</time>
                        <p>
                        {{$comment->content}}
                        </p>
                    </div>
                    </div>
                </div><!-- End comment #1 -->
                @endforeach
                
              <div class="reply-form">
                  <h4>Leave a Reply</h4>
                  <p>Your email address will not be published. Required fields are marked * </p>
                {{Form::open(['url'=>'blog/post/'.$post->slug.'/save-comment','method'=>'POST'])}}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            {{Form::text('user_name',null,["placeholder"=>"Name*", "class"=>"form-control", "Required"])}}
                        </div>
                        <div class="col-md-6 form-group">
                            {{Form::text('user_email',null,["placeholder"=>"Email*", "class"=>"form-control", "Required"])}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            {{Form::textarea('content',null,["cols"=>"77","row"=>"6","placeholder"=>"Comment*", "class"=>"form-control", "Required"])}}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Comment</button>
                {{Form::close()}}
              </div>
            </div><!-- End blog comments -->
          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->
  </main><!-- End #main -->
@endsection