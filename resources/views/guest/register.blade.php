@extends('welcome')
@section('content')
<h1 class="center-text">Sign Up</h1>
<div class="form-container">

    {!! Form::open(['route' => 'register.store', 'class' => 'form-post']) !!}
    @include('guest._form-register')
    {!! Form::close() !!}
</div>
@stop