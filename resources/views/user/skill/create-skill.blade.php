@extends('welcome')
@section('content')
    <h1 class="center-text">Sign Up</h1>
    <div class="form-container">
        {!! Form::open(['route' => 'skill.store', 'class' => 'form-post']) !!}
        @include('user.skill._form-skill')
        {!! Form::close() !!}
    </div>
@stop