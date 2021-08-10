@extends ("layout.app")

@section("title")
Home page
@endsection

@section("content")

<div class="posts">
    @if (Route::has("login"))
        @auth 
            <a href="{{route('user.addpostform')}}"><button>add post</button></a>
        @endauth
    @endif

    @foreach ($posts as $post)
        
    
        <div class="card">
          <div class="post-info">
            <div class="user-profile-wrap">
              <img src="{{url('image/Noise.png')}}" alt="image" class="profile" />
              <p>{{$post->name}} <b>{{$post->title}}</b></p>
              
            </div>
            <hr />
            <p class="content-post">
              {{$post->user_post}}
            </p>
          </div>

          <div class="post-controls">
            <div class="upvote-wrap">
              <i class="bx bxs-upvote upvote-icon"></i>

              <span> 1.1k</span>
            </div>

            <div class="downvote-wrap">
              <i class="bx bxs-downvote downvote-icon downvoted"></i>
              <span>23</span>
            </div>

            <a href="{{route('user.comment', ['post_id'=>$post->id])}}" class="comment-button">comments</a>
          </div>
        </div>
    @endforeach
</div>
@endsection