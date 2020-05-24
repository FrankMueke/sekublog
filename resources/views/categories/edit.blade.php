@extends('main')
@section('title', '|Edit Category')
@section('content')

<div class="row">
    <div class="col-md-8">
<form action="{{ route('categories.update', $category->id)}}" method="post">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="name" class="form-spacing-top"></label>
    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
    </div>
<button type="submit" class="btn btn-success">Save Changes</button>
</form>
</div>
</div>
    
@endsection