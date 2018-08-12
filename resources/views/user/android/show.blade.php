@extends('welcome')
@section('content')
    <div>
        <article class="article-item col-sm-12 col-md-6">
            <h2>{!! $android->name  !!} </h2>
            <p>
                reliability: {!! $android->reliability  !!}
            </p>
            <p>
                job: {{$android->job->name}}
            </p>
            {{--            {!! $android->skills !!}--}}
            @foreach($android->skills as $skill)
                <a>{!! $skill->name !!}</a>
            @endforeach
        </article>
    </div>
@stop