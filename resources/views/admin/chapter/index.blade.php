@extends('admin.admin_layout')
@section('admin_body')
<table class='table table-responsive'>
    <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Name
            </th>
            <th>
                Title
            </th>
            <th>
                Series Name
            </th>
            <th>
                Created Date
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($chapters as $i)
        <tr>
            <td>
                {{$i->id}}
            </td>
            <td>
                {{$i->name}}
            </td>
            <td>
                {{$i->title}}
            </td>
            <td>
                {{$i->series->name}}
            </td>
            <td>
                {{$i->created_at}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection