
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (\Session::get('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
@endif
<div class="form-group">
    {!! Form::label('Name') !!}
    @if (isset($job))
        {!! Form::text('name', $job->name, ['class'=>'form-control']) !!}
    @else
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('Description') !!}
    @if (isset($job))
        {!! Form::textarea('description', $job->description, ['class'=>'form-control']) !!}
    @else
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('Complexity level') !!}
    @if (isset($job))
        {!! Form::number('complexity_level', $job->complexity_level, ['class'=>'form-control']) !!}
    @else
        {!! Form::number('complexity_level', null, ['class'=>'form-control']) !!}
    @endif
</div>
<div class="form-group">
    @if (isset($job))
        {!! Form::submit('Edit', ['class'=>'btn btn-primary full-width']) !!}
    @else
        {!! Form::submit('Create', ['class'=>'btn btn-primary full-width']) !!}
    @endif
</div>