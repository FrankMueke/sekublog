@extends('main')
@section('title', '|All Posts')
@section('content')
<div class="row">
    <div class="col-md-10 col-xs-4">
        <div class="h1">All Posts</div>
    </div>
    <div class="col-md-2 col-xs-1">
    {{-- <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">Create New Post</a> --}}
    <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
    </div>
    <div class="col-md-12 col-xs-4">
        <hr>
    </div>
</div> <!--end of row -->
<div class="row">
    <div class="col-md-12 col-xs-4">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th></th>
            </thead> 

            <tbody>

                @if(count($posts) > 0)
                @foreach($posts as $post)

                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : ""}}</td>
                    <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                <td>
                    <a href="/posts/{{$post->id}}" class="btn btn-primary btn-sm">View</a> 
                    {{-- <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">View</a> --}}
                    
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-dark btn-sm">Edit</a></td>
                </tr>
                @endforeach
                @else
                No post yet
                @endif
            </tbody>
        </table>
    
        <div class="text-center">
            {{ $posts->links() }}
       </div>
    </div>
</div>
@endsection