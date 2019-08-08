@if(count($errors)> 0)
    <div class="mt-5"></div>
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>    
    @endforeach
@endif

@if (session('success'))
    <div class="mt-5"></div>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mt-5"></div>
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif