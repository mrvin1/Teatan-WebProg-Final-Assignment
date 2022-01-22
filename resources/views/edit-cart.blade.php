@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Detail User</title>
</head>
<body>

@include('layouts.navigation')

<div class="container border p-2" style="margin-top: 50px">

    <h2>{{$cart->drink->name}} </h2>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="{{Storage::url($cart->drink->cover)}}" class="card-img-top">
            </div>

            <div class="col-8">
                <div class="row">
                    <div class="col">
                        Name
                    </div>

                    <div class="col">
                        {{$cart->drink->name}}
                    </div>
                </div>


                <div class="row" style="margin-top: 10px">
                    <div class="col">
                        Description
                    </div>

                    <div class="col">
                        {{$cart->drink->synopsis}}
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">
                    <div class="col">
                        Price
                    </div>

                    <div class="col">
                        IDR. {{$cart->drink->price}}
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">
                    <form method="post" action="{{route('update-item', $cart->id)}}">
                        @csrf
                        <div class="row mb-3">

                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>

                                    <input type="number" class="form-control" aria-label="Sizing example input"
                                           aria-describedby="inputGroup-sizing-default" name="quantity" value="{{$cart->quantity}}">
                                </div>
                            </div>


                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

@include('layouts.footer')
</html>
