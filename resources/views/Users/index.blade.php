@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
<a href="{{route("Users.create")}}" class="btn btn-primary">add user</a>
</div>
   <div class="row row-cols-1 row-cols-md-3 g-4" >
    @forelse ($Users as $User)
    <div class="col">
        <div class="card h-100">
            <div class="container">
                <div class="row">

                </div>
              </div>
            <div class="card-body">
                <h1>{{ $User->name }}</h1>
                @if ($User->is_admin)
                <p>admin</p>
                @else
                <p>user</p>
                @endif
                <p>{{ $User->email }}</p>
                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('Users.edit', $User->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('Users.destroy', $User->id) }}" method="POST" class="mb-0">
                        @csrf
                        @method('DELETE')
                       <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>

@empty
    <h1>no users to show </h1>
@endforelse
   </div>

@endsection

