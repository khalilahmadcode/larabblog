@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-6">
            <h1 class="display-5">Posts</h1>
        </div>
        <div class="col-6 text-right">
            <h3><a href="{{ route('posts.create') }}">Create a Post</a></h3>
        </div>
    </div>
    
    <hr>
    @if( count($posts) > 0)
        @foreach($posts as $post)
            <div class="row">
                <div class="col-12">
                    <div class="p-3">
                        <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                        <small>{{$post->created_at}}</small>

                        {{-- Delete form  --}}
                        <div class="text-right">
                            <form action=" {{ route('posts.destroy', $post->id) }}" method="post">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>

                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        @endforeach 
        {{-- paginate --}}
        {{ $posts->links() }}
    @else
        <p>No pots found.</p>
    @endif
@endsection