@extends("layouts.app")
@section("content")
<div class="container">
    @foreach($teachers as $teacher)
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $teacher->name }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $teacher->created_at->diffForHumans() }}
            </div>
            <p class="card-text">{{ $teacher->address }}</p>
            <img src="{{ asset('images/teachers/'.$teacher->image) }}" height="30px" width="30px" />
            <a href="/teachers/{{$teacher->id}}/edit"><button class="btn btn-success">Edit</button></a>
            <form action="/teachers/{{$teacher->id}}" method="POST">
                {{ method_field("DELETE") }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach

</div>
@endsection