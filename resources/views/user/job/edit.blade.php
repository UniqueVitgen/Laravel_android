@extends('welcome')
@section('content')
    <h1 class="center-text">Edit Job</h1>
    <div class="form-container">
        {!! Form::open(['route' => ['job.update', $job], 'class' => 'form-post']) !!}

        {{ csrf_field() }}{{ method_field('PATCH') }}
        @include('user.job._form-job', ['submitButtonText' => 'Edit'])
        {!! Form::close() !!}
    </div>
@stop