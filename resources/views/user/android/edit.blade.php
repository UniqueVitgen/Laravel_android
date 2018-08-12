@extends('welcome')
@section('content')
    <h1 class="center-text">Edit Android</h1>
    <div class="form-container">
        {!! Form::open(['route' => ['android.update', $android], 'class' => 'form-post']) !!}

        {{ csrf_field() }}{{ method_field('PATCH') }}
        @include('user.android._form-android', ['submitButtonText' => 'Edit'])
        {!! Form::close() !!}
    </div>
@stop