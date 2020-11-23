@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/students/{{$student->id}}" method="POST" enctype="multipart/form-data">
        {{ method_field("PATCH") }}
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{$student->name}}">
        </div>
        <div class="form-group">
            <label>Level</label>
            <input type="text" name="level" class="form-control" value="{{$student->level}}">
        </div>
        <div class="form-group">
            <label>Skill</label>
            <textarea name="skill" class="form-control">{{$student->skill}}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            @if($student->image)
            <img src="{{ asset('images/students/'.$student->image) }}" height="70" width="70">
            @endif
            <input type="file" name="image" class="form-control" value="{{ $student->image }}">
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>
        <input type="submit" value="Edit student" class="btn btn-primary">
    </form>
</div>
@endsection