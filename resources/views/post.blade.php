@extends('layouts.blog-post')

@section('content')
  <h1>{{$post->title}}</h1>

  <!-- Author -->
  <p class="lead">
    by <a href="#">{{$post->user->name}}</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

  <hr>

  <!-- Preview Image -->
  <img class="img-responsive" src="{{$post->photo->file}}" alt="">

  <hr>

  <!-- Post Content -->
  <p>{{$post->body}}</p>
  <hr>
@if(Session::has('comment message'))
      {{session('comment message')}}

    @endif
  <!-- Blog Comments -->
  @if(Auth::check())

  <!-- Comments Form -->
  <div class="well">
    <h4>Leave a Comment:</h4>
      {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
         <input type="hidden" name="post_id"  value="{{$post->id}}">
          <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
          </div>

           <div class="form-group">
             {!! Form::submit('Submit Comment',['class'=>'btn btn-primary']) !!}
           </div>

      {!! Form::close() !!}
  </div>

  @endif

  <hr>
@if(count($comments)>0)
  <!-- Posted Comments -->
@foreach($comments as $comment)
  <!-- Comment -->
  <div class="media">
    <a class="pull-left" href="#">
      <img height="60" class="media-object" src="{{$comment->photo}}" alt="">
    </a>
    <div class="media-body">
      <h4 class="media-heading">{{$comment->author}}
        <small>{{$comment->created_at->diffForHumans()}}</small>
      </h4>
      <p>{{$comment->body}}</p>
        @if(count($comment->replies)>0)
            @foreach($comment->replies as $reply)
                @if($reply->is_active==1)
               <div class="media" id="nested-comment">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">{{$reply->author}}
                    <small>{{$reply->created_at->diffForHumans()}}</small>
                  </h4>
                 <p>{{$reply->body}}</p>
                </div>
                <div class="comment-reply-container">
                  <button class="toggle-reply btn-btn-primary pull-right">Reply</button>
                  <div class="comment-reply col-sm-6">
                    {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
                    <input type="hidden" name="comment_id"  value="{{$comment->id}}">
                    <div class="form-group">
                      {!! Form::label('body','Comment:') !!}
                      {!! Form::textarea('body',null,['class'=>'form-control','rows'=>2]) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                  </div>

              </div>
          </div>
                    @else
                    <h1 class="text-center">No replies</h1>
                @endif
            @endforeach
            @endif
  </div>
  </div>

  @endforeach

  @endif

    @endsection
@section('scripts')
   <script>
     $(".comment-reply-container .toggle-reply").click(function(){
           $(this).next().slideToggle("slow");
     });
   </script>

  @stop



