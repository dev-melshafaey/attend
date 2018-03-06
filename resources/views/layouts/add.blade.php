@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register new employee</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    {!! Form::open(['url' => '/store','class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="">
                            @if ($errors->has('name'))
                            <label class="text-danger">{{ $errors->first('name') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="">
                            @if ($errors->has('email'))
                            <label class="text-danger">{{ $errors->first('email') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Code:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="code" placeholder="">
                            @if ($errors->has('code'))
                            <label class="text-danger">{{ $errors->first('code') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
