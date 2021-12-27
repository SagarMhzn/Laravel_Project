@extends ("layout.app")

@section("title")
Home page
@endsection

@section("content")

<div class="posts">

    @if (Route::has("login"))
        @auth 
        <div class="clickbtn">
            {{-- Click here to <a href="{{route('user.addpostform')}}"  class="add_post">add post</a> --}}
            <a  href="{{ route('user.profile', ['user_id'=>Auth::user()->id]) }} ">
              <img src="{{url('image/Noise.png')}}" alt="post icon">
            </a>
            <input type="text" placeholder="Click here to add post" id="addPost" class="click_here">
          </div>
        @endauth
    @endif


    @foreach ($posts as $post)
        
    
        <div class="card">
          <div class="post-info">
            <div class="user-profile-wrap">
              <img src="{{url('image/Noise.png')}}" alt="image" class="profile" />
              {{-- <p>{{$post->name}} &nbsp; <b>{{$post->title}}</b></p> --}}
              <p> <a href="{{ route('user.profile', ['user_id'=>$post->user_id]) }}"><b>{{$post->name}}</b>  &nbsp; </a>posted:  {{$post->title}}</p>
              
            </div>
            <hr />
            <p class="content-post">
              {{$post->user_post}}
              
            </p>
            <img src="{{url($post->image)}}" alt="image" class="posted_image"> 
          </div>

          <div class="post-controls">
            <div class="upvote-wrap">
              <button class="upvote-Btn" onClick="upvoteHandler()"> <i class='bx bx-up-arrow' id="upvote-icon" ></i>  </button>
              
              <span id="upvote-count">0</span>
            </div>
{{-- 
            <div class="downvote-wrap">
              <i class='bx bx-down-arrow downvote-icon downvoted' ></i>
              <span>23</span>
            </div> --}}

            <a href="{{route('user.comment', ['post_id'=>$post->id])}}" class="comment-button">comments</a>
          </div>
        </div>
    @endforeach
</div>
@endsection