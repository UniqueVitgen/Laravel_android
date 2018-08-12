@extends('welcome')
@section('content')
    @foreach($skills as $skill)
        {{--<article>--}}
        <ul>
            <li>
                {{--{!! $skill->name  !!}--}}
                <h2>{!! $skill->name  !!} </h2>
                <p>
                    {{--{!! Form::open(['method' => 'GET', 'route' => ['skill.show', $skill]]) !!}--}}
                    {{--<button type="submit" class="btn btn-primary button-android" role="button">Просмотреть</button>--}}
                    {{--{!! Form::close() !!}--}}
                    {!! Form::open(['method' => 'GET', 'route' => ['skill.edit', $skill]]) !!}
                    <button type="submit" class="btn btn-warning button-android" role="button">Редактировать</button>
                    {!! Form::close() !!}
                    {!! Form::open(['method' => 'DELETE', 'route' => ['skill.destroy', $skill]]) !!}
                    <button type="submit" class="btn btn-danger button-android" role="button">Удалить</button>
                    {!! Form::close() !!}
                </p>
            </li>

        </ul>
        {{--</article>--}}
    @endforeach
@stop