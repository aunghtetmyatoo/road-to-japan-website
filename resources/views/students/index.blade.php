@extends("layouts.app")
@section("content")
<div class="container">
    @foreach($students as $student)
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $student->created_at->diffForHumans() }}
            </div>
            <p class="card-text">{{ $student->level }}</p>
            <p class="card-text">{{ $student->skill }}</p>
            <img src="{{ asset('images/students/'.$student->image) }}" height="30px" width="30px" />
            <a href="/students/{{$student->id}}/edit"><button class="btn btn-success">Edit</button></a>
            <form action="/students/{{$student->id}}" method="POST">
                {{ method_field("DELETE") }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach


</div>
@endsection