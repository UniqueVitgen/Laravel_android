@extends('welcome')
@section('content')
    <div>
        {{--<a href="{{url('/')}}">published</a>&nbsp;&nbsp;&nbsp;&nbsp;--}}
        {{--<a href="{{url('unpublished')}}">unpublished</a>--}}
        {!! link_to_route('posts', 'published') !!}
        &nbsp;&nbsp;&nbsp;&nbsp;
        {!! link_to_route('posts.unpublished', 'unpublished') !!}
        &nbsp;&nbsp;&nbsp;&nbsp;
        {!! link_to_route('post.create', 'new') !!}
    </div>
    @foreach($posts as $post)
        <article>
            <h2>{!! $post->title  !!} </h2>
            <p>
                {!! $post->excerpt  !!}
            </p>
            <p>
                published: {{$post->published_at}}
            </p>
        </article>
    @endforeach
@stop