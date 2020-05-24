@extends('main')
@section('title', '| Homepage')
@section('content')

      <div class="container-fluid container-spacing-top">
          <div class="row no-gutters">
              <div class="col-md-12 col-xs-3">
                <div class="jumbotron">
                    <h1 class="display-4 text-danger">Welcome to my site!</h1>
                    <p class="lead">   This is the home news , sports. entertainment ans politics. This is the home news , sports. entertainment ans politics.</br>
                        Please check our latest posts here
                    .</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Popular  Posts </a>
                  </div>
              </div>
          </div><!--end of header .row -->

          <div class="row row1 no-gutters">
              <div class="col-md-8 col-xs-2">
                @foreach($posts as $post)
                      <div class="post">
                          <div class="post-image">
                            <a href="{{ url('blog/'.$post->slug) }}"><img class="postimg" src="{{ asset('images/'. $post->image )}}" height="150" width="300" alt="Image here"></a>
                        </div>
                        <div class="post-content">  
                        <a class="text-body" href="{{ url('blog/'.$post->slug) }}"> <h3 class="ptitle-style">{{ $post->title }}</h3></a>
                          
                          <p>{{ substr(strip_tags($post->body), 0, 150) }}{{ strlen(strip_tags($post->body)) > 150 ? "..." : "" }}</p>
                      {{-- <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a> --}}
                          </div>  
                    </div>
                <hr>
                @endforeach
                
              </div>
              
              
              <div class="col-md-4 col-xs-1 sticky">
                  <h2 class="ptitle-style bg-danger text-white">Latest News</h2>
                  <div class="list-group">
                    <ol class="ptitle-style text-danger">
                    @foreach($posts->take(10) as $post)
                    <li><a href="{{ url('blog/'.$post->slug) }}" class="list-group-item list-group-item-action list-group-item-secondary" "><h5>{{ $post->title }}</h5></a>
                    </li>
                        @endforeach
                    </ol>
                </div>
                
              </div>
              <div class="pagination justify-content-center">
                {{ $posts->links() }}
           </div>
          </div><!--end of row-->

    </div><!--end of container -->
@endsection 
