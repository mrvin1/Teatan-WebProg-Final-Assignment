@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>

@include('layouts.navigation')

<div class="container border p-2" style="margin-top: 50px">

    <h2>Profile</h2>

    <br>

    <form method="post" action="{{route('edit-profile')}}">
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
                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
            </div>
        </div>

        <div class="container d-flex flex-row-reverse justify-content-even">

            <a href="{{route('show-change-password')}}" class="btn btn-primary">Change Password</a>



            <button type="submit" class="btn btn-primary" style="margin-right: 50px">Update</button>

        </div>
    </form>
</div>

@include('layouts.footer')

</body>
</html>
