
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
    @if (isset($skill))
        {!! Form::text('name', $skill->name, ['class'=>'form-control']) !!}
    @else
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @endif
</div>
<div class="form-group">
    @if (isset($skill))
        {!! Form::submit('Edit', ['class'=>'btn btn-primary full-width']) !!}
    @else
        {!! Form::submit('Create', ['class'=>'btn btn-primary full-width']) !!}
    @endif
</div>