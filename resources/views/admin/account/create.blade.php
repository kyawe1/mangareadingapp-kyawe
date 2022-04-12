@extends('admin.admin_layout')
@section('admin_body')
<form method="post" class="container" action="{{route('admin.account-create-process')}}">
    @csrf
    <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Name"/>
    </div>
    <div class="mb-2">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control"/>
    </div>
    <div class="mb-2">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
    </div>
    <div class="mb-2">
        <label for="password_confirmation" class="form-label">Password Confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password Confirmation" />
    </div>
    
    <div class="mb-2">
        <label for="role" class="form-label">Select Role </label>
        <select  name="role" id="role" class="form-control" >
            <option selected>Select Something</option>
            @foreach($roles as $role)
            <option value="{{$role->name}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-2">
        <input type="submit" class="btn btn-primary w-75 d-block m-auto"/>
    </div>
    
</form>
@endsection