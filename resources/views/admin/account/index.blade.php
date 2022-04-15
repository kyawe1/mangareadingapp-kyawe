@extends('admin.admin_layout')
@section('admin_body')
<table class='table table-responsive'>
    <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                User Name
            </th>
            <th>
                Email
            </th>
            <th>
                CreatedAt
            </th>
        </tr>
    </thead>
    <tbody>
        @if(count($users)>0)
        @foreach($users as $i)
        <tr>
            <td>
                {{$i->name}}
            </td>
            <td>
                {{$i->email}}
            </td>
            <td>
                @if($i->is_in_role('admin'))
                {{'admin'}}
                @elseif ($i->is_in_role('author'))
                {{'author'}}
                @else
                {{'user'}}
                @endif
            </td>
            <td>
                {{$i->created_at}}
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@endif
@endsection