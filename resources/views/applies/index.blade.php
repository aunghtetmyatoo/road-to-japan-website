@extends("layouts.app")
@section("content")
<div class="container">
    @foreach($applies as $apply)
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $apply->name }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $apply->created_at->diffForHumans() }}
            </div>
            <p class="card-text">{{ $apply->rollno }}</p>
            <img src="{{ asset('images/applies/'.$apply->image) }}" height="30px" width="30px" />
            <p class="card-text">{{ $apply->address }}</p>
            <p class="card-text">{{ $apply->purpose }}</p>
            <form action="/applies/{{$apply->id}}" method="POST">
                {{ method_field("DELETE") }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach


</div>
@endsection