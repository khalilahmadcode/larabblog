@extends('layouts.app')

@section('content')
    <h1 class="pt-5">Create Post</h1>
    
    <div class="form-group">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="type the title here." >
            
            <label for="body" class="mt-3">Body</label>
            <textarea rows="10" type="text" name="body" class="form-control" placeholder="Type body contet here..."></textarea>
            
            <label for="submitbtn" class="mt-4"></label>
            <input type="submit" value="Submit" name="submitbtn"  class="btn btn-primary">
        </form>
    </div>
@endsection