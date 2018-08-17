@extends('layouts.admin')

@section('content')
     <h1>Categories</h1>

     <div class="row">
          <div class="col-sm-6">
              {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
                   <div class="form-group">
                        {!! Form::label('name','Category:') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                   </div>
                   <div class="form-group">
                        {!! Form::submit('Create Category',['class'=>'btn btn-primary']) !!}
                   </div>
               {!! Form::close() !!}
          </div>
          <div class="col-sm-6">
               <table class="table">
                    <thead>
                       <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Created Date</th>
                       </tr>
                    </thead>
                    @if($categories)
                         <tbody>
                         @foreach($categories as $category)
                        <tr>
                             <td>{{$category->id}}</td>
                             <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a></td>
                              <td>{{$category->created_at->diffForHumans()}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                    @endif
               </table>
          </div>

     </div>
    @endsection