@extends('layouts.app')

@section("content")
<form class="form" action="{{route("login")}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="enter your email">
      </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">password</label>
        <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="enter your password">
      </div>
    <input type="submit" value="login" class="btn btn-primary mb-3">
    </form>
@endsection


