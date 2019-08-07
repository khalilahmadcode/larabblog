@extends('layouts.app')

@section('content')

    <div class="well pt-4">
        <a href="/posts" class="btn btn-primary">Go Back</a>
        <br><br>
        <h3>{{ $post->title }}</h3>
        <p class="lead">{{$post->body}}</p>
        <hr>
        <small>Written on {{$post->created_at}}</small>
    </div>

@endsection