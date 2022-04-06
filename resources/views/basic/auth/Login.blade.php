@extends('layout')
@section('body')
<div class="container-fluid ">
    <div class='d-flex'>
        <div class="hidden-xs-down col-8">
            <img src="{{asset('default.png')}}" alt="logo" class="img-fluid">
        </div>
        <div class="col-12 col-md-4 p-lg-3 my-auto d-block">
            <form action="{{route('auth.login')}}" method="post">
                <h4 class='mb-2 lh-lg text-center'> Welcome From Login Of MangaReadingApp </h4>
                @csrf
                <div class='mb-2'>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class='mb-2'>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="w-100 m-1">
                    <input type="submit" class='btn btn-primary btn-outline-light w-100' vlaue="Login">
                </div>
            </form>
            <div class="text-center">
                If you don&nbsp;t have account. Please click <a href="{{route('auth.register')}}">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection