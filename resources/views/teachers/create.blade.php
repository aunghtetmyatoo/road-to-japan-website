@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/teachers" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>

        <input type="submit" value="Add Teacher" class="btn btn-primary">
    </form>
</div>
@endsection