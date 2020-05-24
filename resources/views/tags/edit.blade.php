@extends('main')
@section('title','|Edit Tag')
@section('content')

<form action="{{ route('tags.update', $tag->id) }}" method="POST">
    @method('PATCH')
@csrf
<div class="form-group">
    <label for="name" class="form-spacing-top"></label>
<input type="text" name="name" class="form-control" value="{{ $tag->name }}">
</div>
 <button type="submit" class="btn btn-success">Save Changes</button>
</form>
    
@endsection