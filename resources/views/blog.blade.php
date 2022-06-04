@extends('layouts.master') @section('content')

<div class="container">
    <a class="btn btn-primary" href="/blogcreate">Add Blog</a>
    <table class="table table-striped table-hover">
        <tr>
            <th>Judul blog</th>
            <th>Deskripsi</th>
            <th>Gamabr</th>
            <th>Nama</th>
            <th>Perintah</th>
        </tr>
        @foreach ($blog as $b)
        <tr>
            <td>{{ $b->title }}</td>
            <td>{{ $b->description }}</td>
            <td>
                <img src="{{ asset('photoblog/'.$b->photo) }}" alt="" style="width: 100px;">
            </td>
            <td>{{ $b->user->name}}</td>

            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="btn btn-success" href="/blog/{{ $b->id }}/edit"
                        >Edit</a
                    >
                    <form action="/blog {{ $b->id }}" method="POST">
                        @csrf @method('delete')
                        <input
                            class="btn btn-danger"
                            type="submit"
                            value="Delete"
                        />
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
