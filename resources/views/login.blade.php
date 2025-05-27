@extends('layouts.main')


@section('container')
 <form action="/login" method="post">
    @csrf
    
    {{-- <img class="mb-4" src="{{ asset('image/img1.jpg') }}" alt="" width="150" height="150"> --}}
    <h1 class="h3 mb-3 fw-normal">Please log in</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label><input type="checkbox" value="remember-me"> Remember me</label>
    </div>

    <button class="w-100 btn btn-lg btn-success" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2025</p>
  </form>


@endsection
