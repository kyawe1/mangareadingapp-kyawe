@extends('admin.admin_layout')
@section('admin_body')

    @foreach($waiting_lists as $user_role)
        @include('admin.author.authorcard',['author'=>$user_role])   
    @endforeach

@endsection