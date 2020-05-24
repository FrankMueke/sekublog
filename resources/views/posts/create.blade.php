@extends('main')
@section('title', '|Create New Post')
@section('content')
@section('stylesheets')

<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
<script src="https://cdn.tiny.cloud/1/janthy1k75r6i1phmsnvompai1l4r33o0aatavvoggd9wo6n/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
      tinymce.init({
        selector: '#textarea',
        plugins: 'link code',
        menubar: false
      });
    </script>
@endsection
  <div class="row">
      <div class="col-md-8 offset-2">
<h1>Create New Post</h1>
<hr>
<form action="/posts" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label name="title">Title:</label>
        <input name="title" type="text" id="title" class="form-control" placeholder="Post Title" autocomplete="off">
        {{-- @error('title')<p style="color: red">{{ $message }}</p> @enderror >>>..Errors displayed under _messages --}}
    </div>
    <div class="form-group">
    <label name="slug">Slug:</label>
        <input name="slug" type="text" id="slug" class="form-control" placeholder="Post Slug" autocomplete="off" minlength="5" maxlength="255">
        {{-- @error('title')<p style="color: red">{{ $message }}</p> @enderror >>>..Errors displayed under _messages --}}
    </div>
    <div class="form-group">
        <label name="category_id">Category:</label>
           <select class="form-control" name="category_id" id="category_id">
            @foreach ($categories as $category)
           <option value="{{ $category->id }}">{{$category->name}}</option>  
            @endforeach   
            
           </select>
    </div>
    <div class="form-group">
        <label name="tags">Tags:</label>
           <select class="form-control select2-multi" multiple="multiple" name="tags[]" id="tags">
            @foreach ($tags as $tag)
           <option value="{{ $tag->id }}">{{$tag->name}}</option>  
            @endforeach   
            
           </select>
    </div>
    <div class="form-group">
        <label for="featured_image">Upload Featured Image</label>
        <input type="file" name="featured_image">
    </div>
  <div class="form-group">
      <label name="body">Body:</label>
      <textarea id="textarea" name="body" class="form-control" rows="10" placeholder="Type the body here...">Body here</textarea>
      {{-- @error('body')<p style="color: red">{{ $message }}</p> @enderror --}}
  </div>
  <input type="submit" value="Create Post" class="btn btn-success btn-block btn-lg">
  @csrf
</form>
      </div>
  </div>
@endsection
@section('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection
