@extends('layouts.master')

@section('content')


<div class="container">
    <h1>Add Blog</h1>
    <form action="/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Judul blog</label>
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Gambar</label>
            <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" name="user_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          

        <input type="submit" name="submit" class="btn btn-primary"  value="simpan">
    </form>

</div>

@endsection