@extends('admin.admin_layout')
@section('admin_body')
<table class='table table-responsive'>
    <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Series Name
            </th>
            <th>
                UserName
            </th>
            <th>
                Is Like
            </th>
            <th>
                CreatedAt
            </th>
        </tr>
    </thead>
    <tbody>
        @if(count($rates)>0)
        @foreach($rates as $i)
        <tr>
            <td>
                {{$i->id}}
            </td>
            <td>{{$i->series->name}}
            </td>
            <td>
                {{$i->user->name}}
            </td>
            <td>
                @if($i->isLike)
                {{'liked'}}
                @else
                {{'disliked'}}
                @endif
            </td>
            <td>
                {{$i->created_at}}
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5">
                No Rating to Series
            </td>
        @endif
    </tbody>
</table>

@endsection