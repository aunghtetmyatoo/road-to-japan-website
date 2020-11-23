@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/students" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Level</label>
            <input type="text" name="level" class="form-control">
        </div>
        <div class="form-group">
            <label>Skill</label>
            <textarea name="skill" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <input type="submit" value="Add Student" class="btn btn-primary">
    </form>
</div>
@endsection