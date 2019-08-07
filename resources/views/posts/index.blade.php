@extends('layouts.app')

@section('content')
    <h1 class="pt-5">Posts</h1>
    <hr>
    @if( count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <small>{{$post->created_at}}</small>
            </div>
        @endforeach
        {{-- paginate --}}
        {{ $posts->links() }}
    @else
        <p>No pots found.</p>
    @endif
@endsection