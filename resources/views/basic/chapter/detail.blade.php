@extends('layout')
@section('body')

<section class="container-fluid d-md-flex  align-items-center">
    <div class="col-12 col-lg-3">
        ADS
    </div>
    <div class="col-12 col-lg-6">
        @foreach($chapterpics as $i)
        <div class="px-1">
            <img src="{{asset('default.png')}}" class="img-fluid" />
        </div>
        @endforeach
    </div>
    <div class="col-12 col-lg-3">
        ADS
    </div>
</section>
<footer class='footer-manga-reader'>
    This will show until end..
</footer>
@endsection