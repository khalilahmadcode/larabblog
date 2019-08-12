@extends('layouts.app')

@section('content')
    <div class="mt-3 mb-3">
        <h1>Create / Update Contact Us</h1>
        <hr>
        
        <div class="">
            <form action="" method="POST">
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="form-group">
                    <label for="submitbtn"></label>
                    <input type="submit" name="submitbtn" value="Submit" class="btn btn-primary form-control">
                </div>
            </form>
        </div>
    </div>
@endsection