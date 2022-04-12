@extedns('author.author_layout')
@section('author_body')
<form method="post" class="container" action="{{route('admin.series-create-process')}}">
    @csrf
    <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name"/>
    </div>
    <div class="mb-2">
        <label for="type" class="form-label">Type</label>
        <input type="text" name="type" id="type" class="form-control" placeholder="Type"/>
    </div>
    <div class="mb-2">
        <label for="description" class="form-label">Description</label>
        <textarea type="text" name="description" id="description" class="form-control" placeholder="Description"></textarea>
    </div>
    <div class="mb-2">
        <label for="release_date" class="form-label">Release Date</label>
        <input type="datetime-local" name="release_date" id="release_date" class="form-control"/>
    </div>
    <div class="mb-2">
        <label for="image" class="form-label">Display Image</label>
        <input type="image" name="image" id="image" class="form-control"/>
    </div>
    <div class="mb-2">
        <input type="submit" class="btn btn-primary w-75 d-block m-auto"/>
    </div>
    
</form>
@endsection