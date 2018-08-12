@extends('welcome')
@section('content')
    <div>
        <article class="article-item col-sm-12 col-md-6">
            <h2>{!! $job->name  !!} </h2>
            <p>
                {!! $job->description  !!}
            </p>
            <p>
                published: {{$job->complexity_level}}
            </p>
        </article>
        <br>
        <div>

        @foreach($job->androids as $android)
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
        @endforeach
        </div>
    </div>
@stop