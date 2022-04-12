@extends('author.author_layout')
@section('author_body')
@if($series!=null)
<form method="POST">
    @csrf
    <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{$series->name}}"/>
    </div>
    <div class="mb-2">
        <label for="type" class="form-label">Type</label>
        <input type="text" name="type" id="type" class="form-control" placeholder="Type" value="{{$series->type}}"/>
    </div>
    <div class="mb-2">
        <label for="description" class="form-label">Description</label>
        <textarea type="text" name="description" id="description" class="form-control" placeholder="Description">{{$series->description}}</textarea>
    </div>
    <div class="mb-2">
        <label for="release_date" class="form-label">Release Date</label>
        <input type="datetime" name="release_date" id="release_date" class="form-control" value="{{$series->release_date}}"/>
    </div>
    <div class='mb-2'>
        <img class='img-fluid' src="{{asset($series->image)}}" id="display_img">
    </div>
    <div class="mb-2">
        <input type="file" name="image" id="image" class="form-control" value="{{asset('default.png')}}" hidden/>
    </div>
    <div class="mb-2">
        <input type="submit" class="form-control" class="btn btn-primary w-75 d-block m-auto"/>
    </div>
    
</form>
@else
<div class="alert alert-danger">
    <h4>No series found</h4>
</div>
@endif

<script>
    document.getElementById('display_img').onclick=function(e){
        e.preventDefault();
        document.getElementById('image').click();
        return false;
    }
</script>
@endsection