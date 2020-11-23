@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/applies" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Roll-No</label>
            <input type="text" name="rollno" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Purpose</label>
            <textarea name="purpose" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <input type="submit" value="Apply" class="btn btn-primary">
    </form>
</div>
@endsection