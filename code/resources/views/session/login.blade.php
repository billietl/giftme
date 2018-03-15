@extends('layouts.master')

@section('content')
<h1>Login</h1>
<hr>
@include('layouts.errors')
<form method="POST" target="/login">
    @csrf
    <div class="form-group">
        <label for="name">User name</label>
        <input type="name" class="form-control" id="name" placeholder="user name" name="name" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection
