@extends('layouts.blog')

@section('content')


  
<!-- Post Content Column -->
<div class="col-lg-8">
    <h2 class="mt-4 mb-3">{{ $post->title }}
        <small>by
          <a href="#">Janus Nic</a>
        </small>
    </h2>
    @includeIf('blog.partials.single-post', ['post' => $post])
    <hr>
    @includeIf('blog.partials.quote', ['some' => 'data'])
    @includeWhen($hescomment, 'blog.partials.comments', ['some' => 'data'])
</div>
@endsection

@section('sidebar')
  @include('blog.partials.sidebar')
@endsection
