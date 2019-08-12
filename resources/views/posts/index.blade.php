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
            <div class="row p-3">
                <div class="col-md-4 col-sm-4">
                    <img style="width:100%" src="/storage/cover_image/{{$post->cover_image}}" alt="cover_image">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                    <small>Written on {{$post->created_at}} By {{ $post->user->name }}</small>

                    {{-- Delete form  --}}
                    @guest
                    
                    @else
                        @if( Auth::user()->id === $post->user_id)
                            <div class="text-right">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Update</a>
                                <form action=" {{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-1">Delete</button>
                                </form>
                            </div>
                        @endif
                    @endguest
                </div>
            </div>
            <hr>
        @endforeach 

        {{-- paginate --}}
        {{ $posts->links() }}
    @else
        <p>No pots found.</p>
    @endif
@endsection