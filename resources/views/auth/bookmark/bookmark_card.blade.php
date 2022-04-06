<div class="container my-2">
    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex gap-3 ">
                <div class="col-md-2 col-12 mb-2">
                    <img src="{{asset('default.png')}}" class='img-fluid' />
                </div>
                <div class="col-md-9 col-12 p-2">
                    <div class="m-2 h5">{{$bookmark->series->name}}</div>
                    <div class="m-2 d-flex align-items-center">
                        <span class="col-8">rate 5</span>
                        <a href="{{route('loggedin.unbookmark',['id'=>$bookmark->id])}}" class="text-decoration-none text-black col-4">
                            <span class=" btn btn-primary btn-outline-warning">Bookmarked</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>