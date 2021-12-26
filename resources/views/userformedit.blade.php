@extends ("layout.app")

@section("title")
Home page
@endsection

@section("content")


    {{-- <form action="{{route('userpost.update',['post_id' => $post->id])}}" method="post" enctype="multipart/form-data" >
    @csrf
        <label for="title" >Title</label>
        <input type="text" name="title" id="title" value="{{$post->title}}" required><br>
        <label for="user_post" >Post</label><br>
        <textarea name="user_post" id="user_post" cols="30" rows="10" required>{{$post->user_post}}</textarea><br>
        <label for="image"> Choose images</label>
        <input type="file" id="image" name="image"> <br>
        <input type="submit" value="Update">
    </form> --}}

    <div class="post">
        <p>Edit Form</p>
        <form action="{{route('userpost.update',['post_id' => $post->id])}}" method="post" enctype="multipart/form-data" >
            @csrf
            <label for="title"  >Title</label>
            <input type="text" name="title" id="title" value="{{$post->title}}"  required class="input_field"><br>
            <label for="user_post" style="margin: 0;" >Post</label><br>
            <textarea name="user_post" id="user_post" cols="30" rows="10" required class="input_field" style="margin-top: -20px;" >{{$post->user_post}}</textarea><br>
            <label for="image"> Choose images</label>
            <div class="choose_file"><input type="file" id="image" name="image"> <br>
            <input type="submit" value="Post" class="post_button"></div>
        </form>
    </div>


@endsection

