@extends('main')
@section('title', '|Edit Comment')
@section('content')

    <h1>Edit Comment</h1>
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @method('PATCH')
            @csrf
        <div class="form-group">
            <label name="name">Name</label>
        <input name="name" id="name" class="form-control input-group-lg" value="{{ $comment->name }}" disabled>
        </div>
        <div class="form-group">
            <label name="email" class="form-spacing-top">Email</label>
        <input name="email" id="email" class="form-control" value="{{ $comment->email }}" disabled>
        </div>
        <div class="form-group">
            <label class="form-spacing-top"name="body">Comment</label>
        <textarea name="comment" id="comment" class="form-control input-group-lg" rows="10">{{ $comment->comment }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success btn-block">Update Comment</button>
    </div>
</div>
</form>
    
@endsection