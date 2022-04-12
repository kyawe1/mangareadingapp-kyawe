@extends("layout")
@section('body')
<section class="container">
    <div class="h3 p-2">
        {{$series->name}}
    </div>
    <div class="w-50 m-auto d-block">
        <img src="{{asset('default.png')}}" class="img-fluid d-block m-auto" />
    </div>
    <div>
        <div class="p-4">
            <div class="p-1 mb-1">Author Name</div>
            <div class="p-1 mb-1">{{$series->author->name}}</div>
        </div>
        <div class="p-4">
            <div class="p-1 mb-1">Type</div>
            <div class="p-1 mb-1">{{$series->type}}</div>
        </div>
        <div class="p-4">
            <div class="p-1 mb-1">Release Date</div>
            <div class="p-1 mb-1">{{$series->release_date}}</div>
        </div>
        <!-- <div class="p-4">
            <div class="p-1 mb-1"></div>
            <div class="p-1 mb-1">Army Genius</div>
        </div>
        <div class="p-4">
            <div class="p-1 mb-1">Author Name</div>
            <div class="p-1 mb-1">Army Genius</div>
        </div>
        <div class="p-4">
            <div class="p-1 mb-1">Author Name</div>
            <div class="p-1 mb-1">Army Genius</div>
        </div> -->
    </div>
    <div class='d-flex align-items-center p-4 m-1'>
        @auth
        <div class="col-12 col-lg-9 col-md-6 d-block mx-auto">
            @if(!$series->rated(auth()->user()->id))
            <a class="col text-decoration-none text-black  my-2" href="{{route('loggedin.create-rate',['id'=>$series->id , 'rate'=>1])}}">
                <div class="btn btn-primary mx-2 ">
                    Rate this series
                </div>
            </a>
            <a class="col text-decoration-none text-black my-2" href="{{route('loggedin.create-rate',['id'=>$series->id , 'rate'=>0])}}">
                <div class='btn btn-primary mx-2 '>
                    Down Rate this series
                </div>
            </a>
            @else
            <a href="{{route('loggedin.delete-rate',['id'=>$series->id])}}" class="col-6 text-decoration-none text-black">
                <div class='btn btn-warning'>
                    UnRate this series
                </div>
            </a>
            @endif
        </div>
        @if($series->is_bookmarked(auth()->user()->id))
        <a href="{{route('loggedin.unbookmark',['id'=>$series->id])}}" class="text-decoration-none text-black col-12 col-lg-3 col-md-5">
            <div class="btn btn-light btn-lg">saved</div>
        </a>

        @else
        <a href="{{route('loggedin.bookmark',['id'=>$series->id])}}" class="text-decoration-none text-black col-12 col-lg-3 col-md-5">
            <div class="btn btn-light btn-lg ">save</div>
        </a>

        @endif
        @endauth
    </div>
    <section class="text-wrap mb-2">
        <div class="h4">Details</div>
        <span class="lh-lg">
            {{$series->description}}
            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim accusamus aspernatur facere,
            culpa cumque, aliquam accusantium a minus aperiam eligendi quod harum libero quae v
            el provident nobis architecto! Eveniet, aliquid! -->
        </span>
        <span class="btn btn-light btn-outline-info">see more</span>
    </section>
    <section class="my-2 p-1">
        <div class="h5 py-2">
            Chapter Lists
        </div>
        @if(count($series->chapter)>0)
        @foreach($series->chapter as $chapter)
        <div class="p-3 border-bottom border-2 ">
            <div class="">Chapter 1</div>
        </div>
        @endforeach
        <div class="m-2 w-100 d-block mx-auto ">
            <button class="btn btn-light w-100 btn-outline-dark">More</button>
        </div>
        @else
        <div class="d-block mx-auto text-center p-4 h5">
            There's no New Chapter wait until new chapter comes out
        </div>
        @endif
        
    </section>
</section>

@endsection