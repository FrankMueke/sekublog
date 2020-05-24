@extends('main')
 @section('title', "| $tag->name Tag")
 @section('content')
     <div class="row">
         <div class="col-md-8">
<h1>{{ $tag->name }} Tag <small>{{ $tag->posts->count() }} Posts</small></h1>
        </div> 
        <div class="col-md-2">
        <a href="{{ route('tags.edit', $tag->id)}}" class="btn btn-primary btn-block pull-right" >Edit</a>
            </div>  
        <div class="col-md-2">
        <form action="{{ route('tags.destroy', $tag->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-block">Delete the Tag </button>
            </form>    
            </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tag->posts as $post)
                        <tr>
                        <th>{{ $post->id}}</th>
                        <td>{{ $post->title }}</td>
                        <td>@foreach ($post->tags as $tag)
                        <span class="badge badge-secondary">{{ $tag->name }}</span>
                        @endforeach
                        <td>
                        <a href="{{ route('posts.show', $post->id)}}" class="btn btn-secondary btn-xs">View</a>
                        </td>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 @endsection