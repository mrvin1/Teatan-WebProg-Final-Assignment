@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage User</title>
</head>
<body>

@include('layouts.navigation')

<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col fw-bold">
            Name
        </div>

        <div class="col fw-bold">
            Email
        </div>

        <div class="col fw-bold">
            Role
        </div>

        <div class="col fw-bold">
            Action
        </div>
    </div>

    <hr style="border: 1px solid black">
</div>

<div class="container">
    @foreach($users as $user)
    <div class="row">

        <div class="col">
            {{$user->name}}
        </div>

        <div class="col">
            {{$user->email}}
        </div>

        <div class="col">
            {{$user->role}}
        </div>

        <div class="col">
            <form method="get" action="{{route('show-user-detail', $user->id)}}">
                <button class="btn btn-primary bg-secondary border-0" type="submit" style="margin-bottom: 2%">View Detail</button>
            </form>
            @if($user->role != 'admin')
            <form method="post" action="{{route('delete-user', $user->id)}}">
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-primary bg-danger border-0" type="submit"  style="margin-bottom: 2%">Delete</button>
            </form>
            @endif
        </div>
        <hr>
    </div>
    @endforeach


</div>
</body>

@include('layouts.footer')
</html>
