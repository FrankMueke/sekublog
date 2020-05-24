@extends('main')
@section('title','|All Tags')
@section('content')
    
<div class="row">
    <div class="col-md-8">
        <h1>Tags</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                <th>{{ $tag->id }}</th>
                <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }} </a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $tags->links() }}
       </div>
    </div><!--end of column md-8 -->
    <div class="col-md-4">
        <div class="well">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <h2>New Tag</h2>
            <div class="form-group">
                <label for="name">Tag Name</label>
                <input type="text" name="name" class="form-control">
    
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-h1-spacing">Create New Tag</button>
       </form>
        </div>
    </div>
</div>
    
@endsection