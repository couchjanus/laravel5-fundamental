<!-- Blog Post -->
<div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>  
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            
            <a href="{{ route('blog.show', ['id'=> $post->id]) }}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted on {{ date('d F Y', strtotime($post->created_at)) }} by
            <a href="#">Janus Nic</a>
        </div>
</div>  
