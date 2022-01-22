@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@include('layouts.navigation')

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

<div class="container border p-2" style="margin-top: 50px">

    <h2>Change Password</h2>

    <br>

    <form method="post" action="{{route('update-password')}}">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputEmail3" name="old_pass">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="new_pass">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">New Confirmation Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="confirm_pass">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@include('layouts.footer')

</body>
</html>
