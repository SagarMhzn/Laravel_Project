@extends ("layout.app")

@section("title");
@endsection

@section("content")

<div class="userProfile">
    @foreach ($userPosts as $userPost)
    @if ($userPost->user_id == $user_id)
    {{ $userPost->name }}
    {{ $userPost->title }}   
    {{ $userPost->user_post }} <br> <br>   

    @endif
    @endforeach
</div>

@endsection