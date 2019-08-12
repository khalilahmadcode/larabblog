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
            <div class="row">
                <div class="col-md-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}"><br>
                    <img style="width:100%" src="/storage/cover_image/{{$post->cover_image}}" alt="">
                </div>
                <div class="col-md-6">
                    <label for="body" class="mt-3">Body</label>
                    <textarea rows="10" type="text" name="body" class="form-control">{{$post->body}}</textarea>

                    <label for="image" class="mt-3">Post Image</label><br>
                    <input type="file" class="" name="cover_image">
                    <input type="submit" value="Update" name="submitbtn"  class="float-right btn btn-primary mt-3"> 

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    
                </div>
            </div>
        </form>
    </div>
@endsection