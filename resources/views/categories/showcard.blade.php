<div class="card-deck">
    <div class="card">
      <img class="card-img-top" src="{{ asset('images/'.$post->image)}}" alt="Image here">     
      <div class="card-body">
        @foreach ($category->posts as $post)
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text"><p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p></p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><a href="{{ route('posts.show', $post->id)}}" class="btn btn-secondary btn-xs">View</a></small>
      </div>
    </div>
  </div>