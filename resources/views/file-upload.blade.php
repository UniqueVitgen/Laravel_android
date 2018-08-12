@extends('welcome');

{!! Form::open(['route' => 'uploadfile.store', 'class' => 'form-post']) !!}
{{Form::file('avatar')}}
{{Form::text('name')}}
{!! Form::submit('store', ['class'=>'btn btn-primary full-width']) !!}
{!! Form::close() !!}