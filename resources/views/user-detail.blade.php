@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Detail</title>
</head>
<body>

@include('layouts.navigation')

<div class="container border p-2" style="margin-top: 50px">

    <h2>{{$user->name}} User Detail</h2>

    <br>

    <form method="post" action="{{route('update-user', $user->id)}}">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="role">
                    @if($user->role != 'admin')
                        <option value="admin">Admin</option>
                        <option value="user" selected>User</option>
                    @else
                        <option value="admin" selected>Admin</option>
                        <option value="user">User</option>
                        @endif
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

    </form>
</div>

@include('layouts.footer')

</body>
</html>
