@extends('layouts.template')
@section('content')
    <!--about-starts-->
    <div class="about">
        <div class="container">
            <div class="about-main">
                
                <div class="col-12 about-left">
                    {{--  Recent Posts Section --}}
                    <div class="row">
                        {{--<div class="a-1">--}}
                            @php
                                $recent_posts_count = 0;
                            @endphp
                            @foreach($recent_posts as $recent_post)

                                <div class="col-md-4 abt-left">
                                    @php
                                        //$featured_image = json_decode($recent_post->featured_image,true);
                                        //dd($recent_post->featured_image->thumb);

                                    @endphp
                                    <a href="{{url('/blog/post/'.$recent_post->id)}}">
                                        <img alt="" src="{{asset($recent_post->featured_image->thumb)}}"/>
                                    </a>
                                    {{-- <h6>
                                    Find The Most
                                    </h6> --}}
                                    <h3>
                                        <a href="{{url('/blog/post/'.$recent_post->id)}}">
                                            {{$recent_post->title}}
                                        </a>
                                    </h3>
                                    <div>
                                        {!!str_limit($recent_post->content,280)!!}
                                    </div>
                                    <label>
                                        {{$recent_post->created_at->diffForHumans()}}
                                    </label>
                                </div>
                                @php
                                    $recent_posts_count++;
                                @endphp
                                @if($recent_posts_count%2 == 0)
                                    <div class="clearfix"></div>
                                @endif

                            @endforeach

                        {{--</div>--}}
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--slide-end-->
@endsection
