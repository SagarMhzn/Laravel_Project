@extends ("layout.app")

@section("title")
Home page
@endsection

@section("content")

<p>Edit Form</p>
    <form action="{{route('userpost.update',['post_id' => $post->id])}}" method="post">
    @csrf
        <label for="title" >Title</label>
        <input type="text" name="title" id="title" value="{{$post->title}}" required><br>
        <label for="user_post" >Post</label><br>
        <textarea name="user_post" id="user_post" cols="30" rows="10" required>{{$post->user_post}}</textarea><br>

        <input type="submit" value="Update">
    </form>

@endsection