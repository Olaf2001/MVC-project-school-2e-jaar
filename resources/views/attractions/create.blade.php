@extends('layout.layout')
@section('content')
    <h1 class="mt-5">Attractions</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/attractions') }}">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/attractions/create') }}">Create</a>
            </li>
        </ul>
    </nav>

    {!! Form::open(['url' => '/attractions']) !!}

    <div class="form-group">
        {!! Form::label('waitTime', 'WaitTime') !!}
        {!! Form::text('waitTime', '', ['class' => 'form-control',
                                                   'id' => 'waitTime']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('minAge', 'MinAge') !!}
        {!! Form::text('minAge', '', ['class' => 'form-control',
                                                 'id' => 'minAge']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('minLength', 'Minlength') !!}
        {!! Form::text('minLength', '', ['class' => 'form-control',
                                                    'id' => 'minLength']) !!}
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

    {!! Form::close() !!}
@endsection
