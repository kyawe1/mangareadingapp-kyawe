@extends('author.author_layout')
@section('author_body')
<div class='row row-cols-lg-4 row-cols-md-3 row-cols-2 g-3 mb-2'>
    @if(count($series)>0)
    @foreach($series as $i)

    @include('shared.seriescard',["series"=> $i])

    @endforeach
    @else
    <div class='h5'>
        nothing to show
    </div>
    @endif
</div>
@endsection