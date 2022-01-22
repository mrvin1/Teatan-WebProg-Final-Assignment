@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Drink</title>
</head>
<body>

@include('layouts.navigation')

<div class="container border p-2" style="margin-top: 50px">
    <form action="{{route('add-drink')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Drink Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="synopsis" name="synopsis" rows="3"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price">
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Drink Image</label>
            <div class="col-sm-10">
                <input class="form-control" type="file" id="cover" name="cover">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="container" style="margin-top: 50px" >
    <div class="row">
        <div class="col fw-bold">
            Name
        </div>

        <div class="col fw-bold">
            Synopsis
        </div>

        <div class="col fw-bold">
            Price
        </div>

        <div class="col fw-bold">
            Action
        </div>
    </div>

    <hr style="border: 1px solid black">
</div>

<div class="container mb-5" >
    @foreach($drinks as $drink)
        <div class="row">
            <div class="col">
                {{$drink->name}}
            </div>

            <div class="col">
                <p style="text-overflow: ellipsis">{{$drink->synopsis}}</p>
            </div>

            <div class="col">
                IDR {{$drink->price}}
            </div>

            <div class="col">
                <form method="get" action="{{route('show-drink-detail', $drink->id)}}">
                    <button class="btn btn-primary bg-secondary border-0" style="margin: 2%" type="submit">View Detail</button>
                </form>
                <form method="post" action="{{route('delete-drink', $drink->id)}}">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-primary bg-danger border-0"style="margin: 2%" type="submit">Delete</button>
                </form>
            </div>
            <hr>
        </div>
    @endforeach


</div>

@include('layouts.footer')

</body>
</html>
