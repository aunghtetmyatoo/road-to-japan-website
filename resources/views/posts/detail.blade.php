@extends("layouts.app")
@section("content")
<div class="container">
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $post->created_at->diffForHumans() }}
            </div>
            <p class="card-text">{{ $post->body }}</p>
            <img src="{{ asset('images/posts/'.$post->image) }}" height="30px" width="30px" />
            <a href="/posts/{{$post->id}}/edit"><button class="btn btn-success">Edit</button></a>
            <form action="/posts/{{$post->id}}" method="POST">
                {{ method_field("DELETE") }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <h3>Comments ( {{ count($post->comments) }} )</h3>
    @foreach($post->comments as $comment)
    <div class="panel panel-default">
        <div class="panel-body">
            {!! $comment->comment !!}
        </div>
        <div class="panel-footer">
            {{ $comment->created_at->diffForHumans() }}
            <b>by {{ $comment->user->name }}</b>
            <div class="pull-right">
                <a href="{{ url("/comments/delete/$comment->id") }}">Del</a>
            </div>
        </div>
    </div>
    @endforeach

    @if(Auth::user())
    <form action="{{ url('/comments/add') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea name="comment" class="form-control"></textarea>
        <input type="submit" value="Add Comment" class="btn btn-default">
    </form>
    <br><br>
    @endif
</div>
@endsection