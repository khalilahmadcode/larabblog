@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3 mb-3">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('/posts/create') }}" class="btn btn-primary">Create New Post</a>
                    <hr>
                    <h3>Your Blog Posts</h3>
                    @if ( count($posts) > 0 )
                        <table class="table table-striped">
                            <tr>
                                <th>Blog Post</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                <td><h5><a href=" {{ route('posts.show', $post)}} ">{{ $post->title }}</a></h5></td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}"> Edit </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                
                            @endforeach
                        </table>
                    @else 
                    <hr>
                    <p>You dont have any post.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
