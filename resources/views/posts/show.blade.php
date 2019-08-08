@extends('layouts.app')

@section('content')

    <div class="well pt-4">
        <div class="row">
            <div class="col-6"><a href="/posts" class="btn btn-primary">Go Back</a></div>
            <div class="col-6 text-right">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
            </div>
        </div>

        <br><br>
        <h3>{{ $post->title }}</h3>
        <p class="lead text-justify">{{$post->body}}</p>
        <hr>
        <small>Written on {{$post->created_at}}</small>
    </div>

@endsection 