@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/posts" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <input type="submit" value="Add Article" class="btn btn-primary">
    </form>
</div>
@endsection