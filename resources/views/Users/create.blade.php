@extends('layouts.app')

@section('content')



    <form class="form" action="{{route("Users.store")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="add user name">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="add user email">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="add user password">
      </div>
    <div class="mb-3">
        {{-- <label for="exampleFormControlInput1" class="form-label">role</label> --}}
        {{-- <input type="checkbox" name="is_admin" class="form-control" id="exampleFormControlInput1" placeholder="add user password"> --}}
      </div>
      <input type="checkbox" name="is_admin" value={{true}}>
      <label for="vehicle1"> admin </label><br>

    <input type="submit" value="send" class="btn btn-primary mb-3">
    </form>
@endsection
