@extends ("layout.app")

@section("title")
Comment page
@endsection

@section("content")

<div class="card  ">
    <div class="post-info">
      <div class="user-profile-wrap">
        <img src="{{url('image/Noise.png')}}" alt="image" class="profile" />
        <p> <a href="{{ route('user.profile', ['user_id'=>$post->user_id]) }}">{{$post->name}} &nbsp;</a>posted  <b>{{$post->title}}</b></p>
        
        {{-- <p>{{$post->name}} &nbsp; <b>{{$post->title}}</b></p> --}}
        
      </div>
      
      <hr />
      <p class="content-post">
        {{$post->user_post}}
      </p>
    </div>
    <img src="{{url($post->image)}}" alt="image" class="posted_image"> 
    <br>
    <br>

    <div class="post-controls">
      <div class="upvote-wrap">
        <button class="upvote-Btn" onClick="upvoteHandler()"> <i class='bx bx-up-arrow' id="upvote-icon" ></i>  </button>
        
        <span id="upvote-count">100</span>
      </div>

    {{-- <div class="post-controls">
      <div class="upvote-wrap">
        <i class="bx bxs-upvote upvote-icon"></i>

        <span> 1000</span>
      </div> --}}
      {{-- <div class="downvote-wrap">
        <i class="bx bxs-downvote downvote-icon downvoted"></i>
        <span>23</span>
      </div> --}}

      {{-- <a href="{{route('user.comment', ['$post_id'=>$post -> id])}}" class="comment-button">comments</a> --}}
    </div>

    <div class="commentfield" >
      @if (Route::has("login"))
        @auth 
        <form action="{{route('user.reply',["user_id" => Auth::user()->id,"post_id"=> $post->id ])}}" method="GET">
          @csrf
          <div class="textbox"><textarea placeholder="enter your comment" name="user_comment" class="comment_box" cols="70" rows="3"></textarea>
          <input type="submit" class="click_to_submit"></div>
        </form>
        @else
        <a href="/login" ><p class="Log-in-for-comment"> Log In to Comment</p></a>
        @endauth
    @endif

    </div>

  </div>

  <div class="userComments" style="background-color: black">
    <div>
      <label>Sort By:</label>
      <select name="SortBy" id="lang">
        {{-- <option value="Sort By" disabled>Sort BY</option> --}}
        <option value="By First">By First</option>
        <option value="Latest">Latest</option>
        <option value="Best">Best</option>

      </select>
      <hr class="hr-full-line"/>
    </div>
    @foreach ($comments as $comment)
    @if ($post->id == $comment->post_id)
    <div class="comment-user-name-wrapper">
      <img src = "http://localhost/img/profile.jpg" />
      {{-- <a href="{{ route('user.profile', ['user_id'=>$post->user_id]) }}">{{$post->name}} --}}
        <p class="user-name"><a href="{{ route('user.profile', ['user_id'=>$comment->user_id]) }}"  style="color: white"><b>{{$comment->name}}</b></a> commented:</p>
    </div>
      <p class="user-comment">{{$comment->user_comment}}</p>
      <hr class="hr-full-line"/>
    @endif
    @endforeach
    
  </div>







@endsection
