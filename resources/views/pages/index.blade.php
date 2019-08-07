@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center mt-3">
        <h1>{{$title}}</h1>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>

        <p>
            <a href="/signin" class="btn btn-primary btn-lg" role="button">Signin</a>
            <a href="/signup" class="btn btn-success btn-lg" role="button">Sign Up</a>
        </p>
    </div>
   
@endsection