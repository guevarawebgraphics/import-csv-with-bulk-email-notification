@extends('base')
@section('content')


<section class="page--import wrapper">
    <div class="container py-3">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {!! Form::open(['url' => '/import', 'method' => 'post', 'files' => true]) !!}
            <div class="form-group">
                 <label>Import CSV File here</label>
                {!! Form::file('csv_file', ['class' => 'form-control']) !!}
                <small id="emailHelp" class="form-text text-muted">Download sample format <a href="{{url('csv_format.csv')}}" target="_blank">here.</a></small>
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}


    </div>

</section>
