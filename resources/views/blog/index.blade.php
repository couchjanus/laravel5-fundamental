@extends('layouts.blog')


@section('content')
<!-- Blog Entries Column -->
<div class="col-md-8">
  
  <div class="card mb-4">
    
    <div>
        @foreach($posts as $post)
          <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
          
          <div class="card-body">
              <h2 class="card-title">{{ $post->title }}</h2>  
              <a href="{{ route('blog.show', $post->slug) }}"
                  class="btn btn-info">Read More &rarr;</a>
          </div>

          <div class="card-footer text-muted">
              Posted on  by&nbsp;
              <a href=""> Janus Nic</a>
          </div>
        @endforeach
    <!-- Pagination -->
    </div>
    <div class="pagination justify-content-center mb-4">
      {{ $posts->links() }}
    </div>
  </div>
</div>
@endsection

@section('sidebar')
  @include('blog.partials.sidebar')
@endsection
<!-- /.row -->
