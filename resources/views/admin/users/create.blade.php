@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="animate fadeIn">
    <div class="col-md-12">
      <div class="panel panel-default">
          @include('partials.admin._messages')
        <div class="panel-heading">Add New User <a href="{{ route('users.index') }}" class="btn btn-success btn-sm float-right" title="All users"> <span data-feather="arrow-left"></span> Go Back</a>
        </div>
        <div class="panel-body">
          
            <div class="table-responsive">
                {!! Form::open(['route' => 'users.store']) !!}
                <div class="card">
                  <div class="card-block">
                      <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error ' : '' }}">
                        {!! Form::label('name', 'User Name', array('class' => 'col-md-3 control-label')); !!}
                        {!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => 'User Name')) !!}
                        @if ($errors->has('name'))
                          <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error ' : '' }}">
                          {!! Form::label('email', 'User Email', array('class' => 'col-md-3 control-label')); !!}
                          {!! Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'User email')) !!}
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error ' : '' }}">
                          {!! Form::label('password', 'Password', array('class' => 'col-md-3 control-label')); !!}
                          {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => 'password')) !!}
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>  
                  <div class="card-footer text-muted">
                        {!! Form::button('<span data-feather="save"></span>&nbsp;' . 'Create User', array('class' => 'btn btn-primary btn-sm pull-right','type' => 'submit', )) !!}
                  </div>
                </div>
                {!! Form::close() !!}
            </div>
          </div>
      </div>
    </div>
  </div>    
</div>

@endsection  
