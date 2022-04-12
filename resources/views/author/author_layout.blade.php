@extends('layout')
@section('body')
<div class='container-fluid'>
    <div class="row row-cols-2">
        <div class='col-3 position-sticky top-0 border-0'>
            <div class="">
            <div class="card">
                <div class='card-img-top p-2 m-1'>
                    <img src="{{asset('default.png')}}" class='img-fluid mb-1' alt="profile picture">
                </div>
                <div class="card-header p-2 text-center">
                    <span class="h5">{{auth()->user()->name}}</span>
                </div>
                <div class="card-body">
                    <div class="p-1 d-block mx-auto">
                        <button class="btn btn-primary">Edit your profile</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class='col-9'>
            @yield('author_body')
        </div>
    </div>
</div>
@endsection