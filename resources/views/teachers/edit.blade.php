@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/teachers/{{$teacher->id}}" method="POST" enctype="multipart/form-data">
        {{ method_field("PATCH") }}
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{$teacher->name}}">
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control">{{$teacher->address}}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            @if($teacher->image)
            <img src="{{ asset('images/teachers/'.$teacher->image) }}" height="70" width="70">
            @endif
            <input type="file" name="image" class="form-control" value="{{ $teacher->image }}">
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>
        <input type="submit" value="Edit teacher" class="btn btn-primary">
    </form>
</div>
@endsection