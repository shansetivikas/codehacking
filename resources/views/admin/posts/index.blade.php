@extends('layouts.admin')


@section('content')

     <table class="table">
          <thead>
            <tr>
                 <th>Id</th>
                 <th>Owner</th>
                 <th>Category</th>
                 <th>photo</th>
                 <th>Title</th>
                 <th>body</th>
                 <th>Post Link</th>
                 <th>Comments</th>
                 <th>Created at</th>
                 <th>Updated at</th>
              </tr>
          </thead>
          <tbody>
          @if($posts)
               @foreach($posts as $post)
                  <tr>
                       <td>{{$post->id}}</td>
                       <td>{{$post->user->name}}</td>
                       <td>{{$post->category?$post->category->name:'Uncategorized'}}</td>
                       <td><img height='50' src="{{$post->photo?$post->photo->file:'http://via.placeholder.com/350x150'}}" alt=""></td>
                       <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->title}}</a></td>
                       <td>{{str_limit($post->body,30)}}</td>
                       <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
                       <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                       <td>{{$post->created_at->diffForHumans()}}</td>
                       <td>{{$post->updated_at->diffForHumans()}}</td>
                  </tr>
              @endforeach
               @endif
          </tbody>
     </table>
    @endsection