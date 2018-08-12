@extends('welcome')
@section('content')
    <div>
    @foreach($androids as $android)
        <article class="article-item col-sm-12 col-md-6">
            <img class="article-img" onerror="this.src = 'assets/img/Image_not_available.png'" src="{{route('getimage', $android->avatar)}}">
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
            <p>
                {!! Form::open(['method' => 'GET', 'route' => ['android.show', $android]]) !!}
                <button type="submit" class="btn btn-primary button-android" role="button">Просмотреть</button>
                {!! Form::close() !!}
                {!! Form::open(['method' => 'GET', 'route' => ['android.edit', $android]]) !!}
                <button type="submit" class="btn btn-warning button-android" role="button">Редактировать</button>
                {!! Form::close() !!}
                {!! Form::open(['method' => 'DELETE', 'route' => ['android.destroy', $android]]) !!}
                <button type="submit" class="btn btn-danger button-android" role="button">Удалить</button>
                {!! Form::close() !!}
            </p>
        </article>
    @endforeach
    </div>
@stop