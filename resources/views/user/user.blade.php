@extends('layouts.master') @section('content')

<div class="container">
    <a class="btn btn-primary" href="blog.blogcreate">Add User</a>
    <table class="table table-striped table-hover">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Perintah</th>
        </tr>
        @foreach ($user as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
