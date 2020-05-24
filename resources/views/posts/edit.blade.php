@extends('main')
@section('title', '|Edit Blog Post')
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

    <div class="col-md-8">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
            @csrf
        <div class="form-group">
            <label name="title">Title:</label>
        <input name="title" id="title" class="form-control input-group-lg" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label name="slug" class="form-spacing-top">Slug:</label>
        <input name="slug" id="slug" class="form-control" value="{{ $post->slug }}">
        </div>
        <div class="form-group">
            <label name="category_id" class="form-spacing-top">Category:</label>
         
        <select name="category_id" class="form-control" id="category_id">
        @foreach ($categories as $category)
        <option {{ ($category->id == $post->category_id) ? 'selected' : '' }} value="{{ $category->id }}">
          {{ $category->name }}
        </option>
      @endforeach

        </select>
        </div>
        <div class="form-group">
            <label name="tags" class="form-spacing-top">Tags:</label>
        <select name="tags[]" class="form-control select2-multi" multiple="multiple">
        @foreach ($tags as $tag)
        <option {{ ($tag->id == $post->tag_id) ? 'selected' : '' }} value="{{ $tag->id }}">
          {{ $tag->name }}
        </option>
      @endforeach

        </select>
        </div>
        <div class="form-group">
            <label for="featured_image" class="form-spacing-top">Update Featured Image</label>
            <input type="file" name="featured_image" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-spacing-top"name="body">Body:</label>
        <textarea name="body" id="textarea" class="form-control input-group-lg" cols="30" rows="10">{{ $post->body }}</textarea>
        </div>
        
    
    </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                <dd>{{ date( 'M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                       
                    <a href="/posts/{{$post->id}}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-block">Save changes</button> 
                </div>
    </form> 
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <a href="{{ route('posts.index')}}" class="btn btn-info btn-block btn-h1-spacing text-white"><< See All Posts</a>
                    </div>
                </div>
            </div>
  </div>
</div> <!--end of .row (form) -->
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
</script> 
@endsection