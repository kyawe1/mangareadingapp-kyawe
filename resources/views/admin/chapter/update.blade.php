@extends('admin.admin_layout')
@section('admin_body')
<form method="POST">
    @csrf
    <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name"/>
    </div>
    <div class="mb-2">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Title"/>
    </div>
    <div class="mb-2">
        <label for="series_id" class="form-label">SeriesId</label>
        <textarea type="text" name="series_id" id="series_id" class="form-control" placeholder="Description"></textarea>
    </div>
    <div class="mb-2">
        <input type="submit" name="name" id="name" class="form-control" class="btn btn-primary w-75 d-block m-auto"/>
    </div>
</form>
@endsection