@extends('main')
@section('title','|All Categories')
@section('content')
    
<div class="row">
    <div class="col-md-8">
        <h1>Categories</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                <th>{{ $category->id }}</th>
                <td><a href="{{ route('categories.show', $category->id)}}">{{ $category->name }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {{ $categories->links() }}
       </div>
    </div><!--end of column md-8 -->
    <div class="col-md-4">
        <div class="well">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <h2>New Category</h2>
            <div class="form-group">
                <label for="name"> Category Name</label>
                <input type="text" name="name" class="form-control">
    
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-h1-spacing">Create New Category</button>
       </form>
        </div>
    </div>
</div>
    
@endsection