@extends ("layout.app")

@section("title")
Comment page
@endsection

@section("content")

<div class="card">
    <div class="post-info">
      <div class="user-profile-wrap">
        <img src="{{url('image/Noise.png')}}" alt="image" class="profile" />
        <p>{{$post->name}} &nbsp; <b>{{$post->title}}</b></p>
        
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

      {{-- <a href="{{route('user.comment', ['$post_id'=>$post -> id])}}" class="comment-button">comments</a> --}}
    </div>

    <div class="commentfield" >
      <form action="{{route('user.reply',["user_id" => Auth::user()->id,"post_id"=> $post->id ])}}" method="GET">
        @csrf
      <input type="text" placeholder="enter your comment" name="user_comment">
      <input type="submit">
      </form>
    </div>

  </div>

  <div class="userComments">
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
        <p class="user-name"><b>{{$comment->name}}</b></p>
    </div>
      <p class="user-comment">{{$comment->user_comment}}</p>
      <hr class="hr-full-line"/>
    @endif
    @endforeach
    
  </div>







@endsection
