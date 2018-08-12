@extends('welcome')
@section('content')
    <h1 class="center-text">Sign Up</h1>
    <div class="form-container">
        {!! Form::open(['route' => 'login', 'class' => 'form-post']) !!}
        @include('guest._form-login')
        {!! Form::close() !!}
    </div>
@stop