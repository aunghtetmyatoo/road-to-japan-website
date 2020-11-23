@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
        {{ method_field("PATCH") }}
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control">{{$post->body}}</textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            @if($post->image)
            <img src="{{ asset('images/posts/'.$post->image) }}" height="70" width="70">
            @endif
            <input type="file" name="image" class="form-control" value="{{ $post->image }}">
            <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>
        <input type="submit" value="Add Post" class="btn btn-primary">
    </form>
</div>
@endsection