@extends('layouts.admin')

@section('content')

      <h1>Create Users</h1>

       {!! Form::open(['method'=>'POST','files'=>true,'action'=>'AdminUsersController@index']) !!}
         <div class="form-group">
             {!! Form::label('name','Name:') !!}
             {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Name']) !!}
         </div>
         <div class="form-group">
             {!! Form::label('email','Email:') !!}
             {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Enter Email']) !!}
         </div>
          <div class="form-group">
            {!! Form::label('role_id','Role:') !!}
            {!! Form::select('role_id',[''=>'Choose options']+$roles,['class'=>'form-control','placeholder'=>'Enter Role']) !!}
          </div>
         <div class="form-group">
          {!! Form::label('is_active','Status:') !!}
          {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
         </div>
         <div class="form-group">
             {!! Form::label('file','Photo')!!}
             {!! Form::file('file',null,['class'=>'form-control']) !!}
         </div>
         <div class="form-group">
          {!! Form::label('password','Password:') !!}
          {!! Form::password('password',['class'=>'form-control']) !!}
         </div>
         <div class="form-group">
             {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
         </div>
       {!! Form::close() !!}



      @include('includes.form_error')





    @endsection

