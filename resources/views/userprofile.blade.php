@extends ("layout.app")

@section("title")
User page
@endsection

@section("content")

@foreach ($userPosts as $userPost)
    @if ($userPost->user_id == $user_id)     
    
        <div class="card">
            <div class="post-info">
                <div class="user-profile-wrap">
                <img src="{{url('image/Noise.png')}}" alt="image" class="profile" />
                <p> {{$userPost->name}} posted: <b> {{$userPost->title}}</b></p>
                </div>
                <hr />
                <p class="content-post">
                {{$userPost->user_post}}
                </p>
            </div>
            <img src="{{url($userPost->image)}}" alt="image" class="posted_image"> 

            <div class="post-controls">

                <div class="downvote-wrap">
                <i class='bx bx-reply'></i>
                <p><a href="{{route('user.comment', ['post_id'=>$userPost->id])}}">Goto</a></p>
                
                </div>

                
            </div>

        </div>
    @endif
@endforeach

@endsection