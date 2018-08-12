{{csrf_field()}}
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
    @if (isset($android))
        {!! Form::text('name', $android->name, ['class'=>'form-control']) !!}
    @else
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    @endif
</div>
<div class="form-group">
    {!! Form::label('Job') !!}
    @if (isset($android))
        <select class="form-control" name="job_id">
            @foreach ($jobs as $job)
                <option selected="{{$job->id == $android->job->id}}" value="{{$job->id}}">{{$job->name}}</option>
            @endforeach
        </select>
    @else
        <select class="form-control" name="job_id">
            @foreach ($jobs as $job)
                <option value="{{$job->id}}">{{$job->name}}</option>
            @endforeach
        </select>
    @endif
    {{--{!! Form::select('myselect', $jobs, null, ['id' => 'myselect', 'class'=>'form-control']) !!}--}}
</div>
<div class="form-group">
    {!! Form::label('Avatar') !!}
    @if (isset($android))
        {{--{{Form::file('avatar', [$android->avatar])}}--}}
        <img class="article-img" onerror="this.src = 'assets/img/Image_not_available.png'" src="{{route('getimage', $android->avatar)}}">

        <input id="file" type="file" value="{{$file}}">
    @else
        {{Form::file('avatar')}}
    @endif
</div>
<div class="form-group">
    {!! Form::label('Skills') !!}
    {{--<div class="col-sm-8">--}}
        {{--{!!--}}
        {{--Form::select('skillList[]', App\Models\Skill::orderBy('name', 'asc')->get()->pluck('name', 'id')->toArray(), old('skillsList'),--}}
        {{--['class' => 'form-control', 'data-placeholder' => 'wählen...', 'multiple' => ''])--}}
        {{--!!}--}}

    @if (isset($android))
        <br>
        @foreach ($skills as $skill)
            {!!
            Form::checkbox('skillList[]', $skill->id,
            $android->skills->where('id', $skill->id)->count()>0)
            !!}
            {{ $skill->name }}<br>
        @endforeach
    @else
        <br>
        @foreach ($skills as $skill)
            {!!
            Form::checkbox('skillList[]', $skill->id,
            false
            )
            !!}
            {{ $skill->name }}<br>
        @endforeach
    @endif
    {{--</div>/--}}
</div>
<div class="form-group">
    {{--@if($android != null)--}}
    {{--{!! Form::submit('Create', ['class'=>'btn btn-primary full-width']) !!}--}}
    {{--@else--}}
        {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary full-width']) !!}
    {{--@endif--}}
</div>

<script>
    var file = document.getElementById('file');
    file.files[0] = "{{$file}}";
    console.log(file.files);
</script>