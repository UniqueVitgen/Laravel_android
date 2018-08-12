@extends('welcome')
@section('content')
    @foreach($jobs as $job)
        <article>
            <h2>{!! $job->name  !!} </h2>
            <p>
                {!! $job->description  !!}
            </p>
            <p>
                published: {{$job->complexity_level}}
            </p>
            <p>
                {!! Form::open(['method' => 'GET', 'route' => ['job.show', $job]]) !!}
                <button type="submit" class="btn btn-primary button-android" role="button">Просмотреть</button>
                {!! Form::close() !!}
                {!! Form::open(['method' => 'GET', 'route' => ['job.edit', $job]]) !!}
                <button type="submit" class="btn btn-warning button-android" role="button">Редактировать</button>
                {!! Form::close() !!}
                {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job]]) !!}
                <button type="submit" class="btn btn-danger button-android" role="button">Удалить</button>
                {!! Form::close() !!}
            </p>
        </article>
    @endforeach
@stop