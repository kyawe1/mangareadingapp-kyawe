@extends('layout')
@section('body')
<div class="container-fluid">
    <div class='d-flex'>
        <div class="d-none d-lg-block col-8">
            <img src="{{asset('default.png')}}" alt="logo" class="img-fluid ">
        </div>
        <div class="col-12 col-md-4 p-lg-3 my-auto d-block">
            <h4 class='mb-2 lh-lg text-center'> Welcome From Register Of MangaReadingApp </h4>
            <form action="{{route('auth.register')}}" method="post">
                @csrf
                <div class='mb-2'>
                    <label for="username" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="username" placeholder="UserName">
                </div>
                <div class='mb-2'>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class='mb-2'>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class='mb-2'>
                    <label for="conpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="conpassword" placeholder="Confirm Password">
                </div>
                <div class="w-100 m-1">
                    <input type="submit" class='btn btn-primary btn-outline-light w-100' vlaue="Register">
                </div>
            </form>
            <p class="text-center lh-lg">
                If you already have account. Please click <a href="{{route('auth.login')}}">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection