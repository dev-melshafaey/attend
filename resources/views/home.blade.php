@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

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

                    {!! Form::open(['url' => '/attend','class' => 'form-horizontal']) !!}
                                        
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
                        <label  class="col-sm-2 control-label">Comments:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="comment"></textarea>
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            @if (Session::get('state') === 'IN') 
                            <button type="submit" class="btn btn-danger">Log out</button>
                            @else
                            <button type="submit" class="btn btn-primary">Log in</button>
                            @endif
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
