@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>edit data blog</h1>
        <form action="/blog {{ $blog->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Judul blog</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $blog->title }}">
          </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $blog->description }}">
          </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Gambar</label>
            <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $blog->photo }}">
          </div>
    
        <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
</form>
    </div>

@endsection