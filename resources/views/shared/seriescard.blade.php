<div class='col'>
    <div class="card border-0 shadow-sm">
        <div class="h-75">
            <img src="{{asset('default.png')}}" class="img-fluid rounded-1 d-block mx-auto">
        </div>
        <div class="p-2 text-center">
            <span class="p-1">
                {{$series->name}}
            </span>
        </div>
        <a href="{{route('series.detail',['id'=> $series->id])}}" class="stretched-link" ></a>
        <div class="card-body">
            <div class='d-md-flex align-items-center'>
                <div class="col-12 col-lg-9 col-md-6 text-center text-md-right">
                    rating 5
                </div>
                @auth
                @if($series->is_bookmarked(auth()->user()->id))
                    <a href="{{route('loggedin.unbookmark',['id'=>$series->id])}}" class="text-decoration-none text-black col-12 col-lg-3 col-md-5">
                        <div class="btn btn-light ">saved</div>
                    </a>
                
                @else
                <a href="{{route('loggedin.bookmark',['id'=>$series->id])}}" class="text-decoration-none text-black col-12 col-lg-3 col-md-5">
                    <div class="btn btn-light ">save</div>
                </a>
                
                @endif
                @endauth
            </div>
        </div>
    </div>

</div>