@extends ('layouts.master')

@section ('content')
    <div class="blog-post">
        <h1>Publish a post</h1>
        <hr>
        <form method="post" action="/posts">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Post Title" name="title" >
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Body</label>
                <textarea name="body" id="body"  class="form-control" placeholder="Post Content" ></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>

            @include('layouts.errors')
        </form>

    </div>
@endsection