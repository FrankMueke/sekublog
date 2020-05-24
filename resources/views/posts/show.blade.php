@extends('main')
@section('title', '| View Post')
@section('content')
<div class="row">
    <div class="col-md-8">
    <img src="{{ asset('images/'.$post->image)}}" alt="Image here">
    <h1 class="posttitile-spacing-top font-spartan">{{ $post->title }}</h1>

    <p class="lead">{!! $post->body !!}</p>
    <hr>
        <div class="tags">
        @foreach ($post->tags as $tag)
        <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
        @endforeach
        </div>
        <div id="backend-comments" style="margin-top: 50px;">
        <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="70px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post->comments as $comment)
                    <tr>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ $comment->comment }}</td>  
                    <td>
                    <a href="{{ route('comments.edit', $comment->id)}}" class="btn btn-xs btn-primary"><svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z" clip-rule="evenodd"/>
                      </svg></a>    
                    <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span><svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                      </svg></span></a>
                    </td> 
                    </tr>
                    @endforeach    
                </tbody>
            </table>
    </div>
    </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label><b>Url:</b></label>
                    <p><a href="{{ url('blog/'.$post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
                </dl>
                <dl class="dl-horizontal">
                    <label><b>Category:</b></label>
                    <p>{{ $post->category->name }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label><b>Created At:</b></label>
                <p>{{ date( 'M j, Y h:ia', strtotime($post->created_at)) }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label><b>Last Updated:</b></label>
                    <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                       
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-block">Edit Post</a>
                    </div>
                <div class="col-sm-6">
                
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block ">Delete the Post </button>
                    </form>
                </div>
                </div>

                </div>
                    <div class="row">
                        <div class="col-md-12">
                        <a href="{{ route('posts.index')}}" class="btn btn-info btn-block btn-h1-spacing text-white"><< See All Posts</a>
                        </div>
                    </div>
  </div>
</div>
</div>

@endsection