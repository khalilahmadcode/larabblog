@extends('layouts.app')

@section('content')
    <h1 class="pt-5">Edit Post</h1>
    <div class="text-right">
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
    </div>

    <div class="form-group">
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}">

            <label for="body" class="mt-3">Body</label>
            <textarea rows="10" type="text" name="body" class="form-control">{{$post->body}}</textarea>

            <label for="submitbtn"></label>
            <input type="submit" value="Update" name="submitbtn"  class="btn btn-primary mt-3">
        </form>
    </div>
@endsection