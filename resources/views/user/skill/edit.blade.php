@extends('welcome')
@section('content')
    <h1 class="center-text">Edit Skill</h1>
    {{--{!! $skill !!}--}}
    <div class="form-container">
        {!! Form::open(['route' => ['skill.update', $skill], 'class' => 'form-post']) !!}

        {{--{{ csrf_field() }}{{ method_field('PATCH') }}--}}
        @include('user.skill._form-skill', ['submitButtonText' => 'Edit'])
        {!! Form::close() !!}
    </div>
@stop