@extends('main')
@section('title', '| Politics')
@section('content')

          <div class="container container-spacing-top">
          <div class="row">
              <div class="col-md-8">
                @foreach($posts as $post)
                      <div class="post">
                          <h3 class="ptitle-style">{{ $post->title }}</h3>
                      <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                      <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                      </div>
                <hr>
                @endforeach
              </div>
              <div class="col-md-3 col-md-offset-1">
                  <h2>Sidebar </h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  
                    Duis aute irure dolor in reprehenderit </p>
                  </div>
          </div>
          </div>
@endsection 
