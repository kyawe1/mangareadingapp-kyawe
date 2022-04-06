@extends("layout")
@section('body')
<div class='row row-cols-lg-4 row-cols-md-3 row-cols-2 g-3 mb-2'>
@foreach($series as $i)

    @include('basic.series.seriescard',["series"=> $i])

@endforeach
</div>
@endsection