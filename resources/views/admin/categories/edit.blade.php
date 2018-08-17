@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            {!!Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]])!!}
            <div class="form-group">
                {!! Form::label('name','Category:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Category',['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            {!! Form::close() !!}


            <div class="form-group">
                {!! Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
                   <div class="form-group">
                      {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-6']) !!}
                   </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection