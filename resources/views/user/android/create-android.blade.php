@extends('welcome')
@section('content')
    <h1 class="center-text">Android Create</h1>
    <div class="form-container">
        {!! Form::open(['route' => 'android.store', 'class' => 'form-post', 'enctype'=>"multipart/form-data"]) !!}
        @include('user.android._form-android', ['submitButtonText' => 'Add'])
        {!! Form::close() !!}
    </div>
@stop