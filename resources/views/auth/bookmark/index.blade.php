@extends('layout')
@section('body')
@foreach($bookmarks as $i)
    @include("auth.bookmark.bookmark_card",['bookmark'=> $i])
@endforeach
@endsection