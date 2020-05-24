@extends('main')
@section('tittle', '|Delete Comment')
@section('content') 
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>DELETE THIS COMMENT?</h1>
        <p>
            <strong>Name</strong>{{ $comment->name }}<br>
            <strong>Email</strong>{{ $comment->email}}<br>
            <strong>Comment</strong>{{ $comment->comment}}
        </p>
    <form action="{{ route('comments.destroy', $comment->id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn  btn-lg btn-block btn-danger">YES DELETE THIS COMMENT</button>
    </form>
    </div>
</div>
@endsection