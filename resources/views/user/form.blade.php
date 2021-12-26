@extends ("layout.app")

@section("title")
User Post Form
@endsection

@section("content")
    <div class="post">
        <p>Welcome to the Post Form</p>
        <form action="{{route('userpost.store',['user_id' => Auth::user()->id])}}" method="post" enctype="multipart/form-data" >
            @csrf
            <label for="title"  >Title</label>
            <input type="text" name="title" id="title" placeholder="Enter the title for your post here!" required class="input_field"><br>
            <label for="user_post" style="margin: 0;" >Post</label><br>
            <textarea name="user_post" id="user_post" cols="30" rows="10" required class="input_field" placeholder="Enter your post here!" style="margin-top: -20px;" ></textarea><br>
            <label for="image"> Choose images</label>
            <div class="choose_file"><input type="file" id="image" name="image"> <br>
            <input type="submit" value="Post" class="post_button"></div>
        </form>
    </div>
@endsection