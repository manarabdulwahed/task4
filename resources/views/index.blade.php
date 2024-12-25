@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <div>
<a href="{{route("Posts.create")}}" class="btn btn-primary">add post</a>
@can('admin', Auth::user())
<a href="{{route("Users.index")}}" class="btn btn-primary">users</a>
@endcan

</div>

<form action="{{route("logout")}}" method="POST" class="mb-0" >
    @csrf
    <input type="submit" value="logout" class="btn btn-danger">
</form>
</div>
<br>
   <div class="row row-cols-1 row-cols-md-3 g-4" >
    @forelse ($Posts as $Post)
    <div class="col">
        <div class="card h-100">
            <div class="container">
                <div class="row">
                  @foreach ($Post->images as $image)

            <div class="col">
                <img src="{{ asset('images/' . $image) }}" alt="" class="card-img-top" >
              </div>

            @endforeach

                </div>
              </div>
            <div class="card-body">
                <h1>{{ $Post->title }}</h1>
                <p>{{ $Post->description }}</p>
                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('Posts.edit', $Post->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('Posts.destroy', $Post->id) }}" method="POST" class="mb-0">
                        @csrf
                        @method('DELETE')
                       @can('admin', Auth::user())
                       <input type="submit" value="Delete" class="btn btn-danger">
                       @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>

@empty
    <h1>no data to show </h1>
@endforelse
   </div>

@endsection

