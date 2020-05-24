@extends('main')
 {{-- @section('title', "| $category->name Category") --}}
 @section('content')
     <div class="row">
         <div class="col-md-8">
<h1>{{ $category->name }} Category <small>{{ $category->posts->count() }} Posts</small></h1>
        </div> 
        <div class="col-md-2">
        <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-primary btn-block pull-right" >Edit</a>
            </div>  
        <div class="col-md-2">
        <form action="{{ route('categories.destroy', $category->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-block">Delete the Category </button>
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
                    <th>Categories</th>
                    <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->posts as $post)
                        <tr>
                        <th>{{ $post->id}}</th>
                        <td>{{ $post->title }}</td>
                        <td>@foreach ($post->category as $category)
                        <span class="badge badge-secondary">{{ $post->category->name }}</span>
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