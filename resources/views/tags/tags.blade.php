@extends('layouts.master') @section('content')

<div class="container">
    <a class="btn btn-primary" href="blog.blogcreate">Add User</a>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nama</th>
        </tr>
        @foreach ($tags as $tags)
        <tr>
            <td>{{ $tags->name_tags }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
