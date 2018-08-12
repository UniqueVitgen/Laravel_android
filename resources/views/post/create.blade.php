@extends('welcome')
@section('content')
    <h1 class="center-text">create</h1>
    <div class="form-container">
        {!! Form::open(['route' => 'post.store', 'class' => 'form-post']) !!}
        @include('post._form')
        {!! Form::close() !!}
    </div>
@stop