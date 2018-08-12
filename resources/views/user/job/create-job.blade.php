@extends('welcome')
@section('content')
    <h1 class="center-text">Create Job</h1>
    <div class="form-container">
        {!! Form::open(['route' => 'job.store', 'class' => 'form-post']) !!}
        @include('user.job._form-job')
        {!! Form::close() !!}
    </div>
@stop