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
              {{-- <p>{{$post->name}} &nbsp; <b>{{$post->title}}</b></p> --}}
              <p> <a href="{{ route('user.profile', ['user_id'=>$post->user_id]) }}">{{$post->name}} &nbsp; </a> <b>{{$post->title}}</b></p>
              
            </div>
            <hr />
            <p class="content-post">
              {{$post->user_post}}
              
            </p>
            <img src="{{url($post->image)}}" alt="image" class="profile" style="width: 50%; height:50%; border-radius:0;" > 
          </div>

          <div class="post-controls">
            <div class="upvote-wrap">
              <button class="upvote-Btn" onClick="upvoteHandler()"> <i class="bx bxs-upvote " id="upvote-icon"></i>  </button>

              <span id="upvote-count">100</span>
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