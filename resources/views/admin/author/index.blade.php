@extends('admin.admin_layout')
@section('admin_body')

    @foreach($user_roles as $user_role)
        @include('admin.author.authorcard',['author'=>$user_role])')    
    @endforeach
@endsection