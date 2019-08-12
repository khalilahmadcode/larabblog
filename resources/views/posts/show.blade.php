@extends('layouts.app')

@section('content')

    <div class="well pt-4">
        <div class="row">
            <div class="col-6"><a href="/posts" class="btn btn-primary">Go Back</a></div>
            {{-- if you are not logged in  --}}
            @guest
                @else
                    @if(Auth::user()->id === $post->user_id)
                        <div class="col-6 text-right">
                            
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit Post</a>
                        </div>
                    @endif
            @endguest
           
        </div>
        <br><br>
        <h3>{{ $post->title }}</h3>
        <div class="row">
            <div class="col-md-6">
                <img style="width:100%" src="/storage/cover_image/{{$post->cover_image}}" alt="">
            </div>
            <div class="col-md-6">
                <p class="lead text-justify">{{$post->body}}</p> 
            </div>
        </div>
        <hr>
        <div class="mb-5">
            <small>Written on {{$post->created_at}} By {{ $post->user->name }}</small>
        </div>
    </div>

@endsection 