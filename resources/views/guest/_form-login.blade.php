
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
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Password') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('login', ['class'=>'btn btn-primary full-width']) !!}
</div>