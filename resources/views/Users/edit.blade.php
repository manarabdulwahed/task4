@extends('layouts.app')

@section('content')



    <form class="form" action="{{route("Users.update",$User->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">name</label>
        <input type="text" name="name"  value="{{$User->name}}" class="form-control" id="exampleFormControlInput1" placeholder="add user name">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">email</label>
        <input type="email" name="email"  value="{{$User->email}}" class="form-control" id="exampleFormControlInput1" placeholder="add user email">
      </div>
    {{-- <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">password</label>
        <input type="password" name="password"  value="{{$User->password}}" class="form-control" id="exampleFormControlInput1" placeholder="add user password">
      </div> --}}

    <input type="submit" value="edit" class="btn btn-primary mb-3">
    </form>
@endsection


