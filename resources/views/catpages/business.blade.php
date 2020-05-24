@extends('main')
@section('title', '| Business')
@section('content')

        <div class="container-fluid container-spacing-top">
          
          <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-4 d-flex mb-4">
              <div class="card flex-fill">
                <a href="{{ url('blog/'.$post->slug) }}"><img class="card-img-top postimg rounded-top" src="{{ asset('images/'. $post->image )}}" height="175" width="300" alt="Image here"></a>
                <div class="card-body">
                  <a class="text-body" href="{{ url('blog/'.$post->slug) }}"><h5 class="card-title ptitle-style">{{ $post->title }}</h5></a>
                  <p class="card-text">{{ substr(strip_tags($post->body), 0, 100) }}{{ strlen(strip_tags($post->body)) > 100 ? "..." : "" }}</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">{{ date('M j, Y', strtotime ($post->created_at)) }}</small>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
@endsection 
