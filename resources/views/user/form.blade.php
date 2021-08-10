@extends ("layout.app")

@section("title")
User Post Form
@endsection

@section("content")

    <p>Welcome to the User Form</p>
    <form action="{{route('userpost.store',['user_id' => Auth::user()->id])}}" method="post">
        @csrf
        <label for="title" >Title</label>
        <input type="text" name="title" id="title" placeholder="Enter the title for your post here!" required><br>
        <label for="user_post" >Post</label><br>
        <textarea name="user_post" id="user_post" cols="30" rows="10" required></textarea><br>

        <input type="submit" value="Post">
    </form>

@endsection