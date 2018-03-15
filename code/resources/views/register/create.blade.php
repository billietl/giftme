@extends('layouts.master')

@section('content')
<h1>Open a new account</h1>
<hr>
@include('layouts.errors')
<form method="POST" target="/register">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" />
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
    </div>
    <div class="form-group">
        <label for="password_validation">Confirm password</label>
        <input type="password" class="form-control" id="password_validation" placeholder="Type again" name="password_validation" />
    </div>
    <button type="submit" class="btn btn-primary">Sign up</button>
</form>
@endsection
