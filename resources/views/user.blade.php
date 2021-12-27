@extends ("layout.app")

@section("title")
User page
@endsection

@section("content")
  
<div class="edit_profile">
  <a href="{{url('user/profile')}}">Update user profile</a>
  </div>

@foreach ($posts as $post)
        
    
    <div class="card">
        <div class="post-info">
            <div class="user-profile-wrap">
              <img src="{{url('image/Noise.png')}}" alt="image" class="profile" />
              <p> {{$post->name}} &nbsp; <b>{{$post->title}}</b></p>
            </div>
            <hr />
            <p class="content-post">
              {{$post->user_post}}
            </p>
        </div>

        <img src="{{url($post->image)}}" alt="image" class="posted_image"> 

        <div class="post-controls">
            <div class="upvote-wrap">
              <i class='bx bxs-pencil'></i>
    
                  <a href="{{route('user.timeline.edit', ['post_id'=>$post->id])}}">Edit</a>
            </div>
    
            <div class="downvote-wrap">
              <i class='bx bxs-trash' ></i>
              <a href="{{route('user.timeline.delete', ['post_id'=>$post->id])}}">Delete</a>
            </div>

            <div class="downvote-wrap">
              <i class='bx bx-reply'></i>
              <a href="{{route('user.comment', ['post_id'=>$post->id])}}">Goto</a>
              {{-- <a href="{{route('user.comment', ['post_id'=>$post->id])}}" class="comment-button">comments</a> --}}
            </div>

            
        </div>

    </div>
        
@endforeach

@endsection