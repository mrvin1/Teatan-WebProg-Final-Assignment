@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Detail</title>
</head>
<body>

@include('layouts.navigation')

<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col fw-bold">
            Drink Name
        </div>
        <div class="col fw-bold">
            Price
        </div>
        <div class="col fw-bold">
            Quantity
        </div>

        <div class="col fw-bold">
            Sub Total
        </div>

        <div class="col fw-bold">
            Action
        </div>
    </div>

    <hr style="border: 1px solid black">
</div>

<div class="container">
    @foreach($transaction->details as $detail)
    <div class="row">

        <div class="col">
            {{$detail->drink->name}}
        </div>

        <div class="col">
            IDR {{$detail->drink->price}}
        </div>

        <div class="col">
            {{$detail->quantity}} Drink
        </div>

        <div class="col">
            IDR {{$detail->subtotal}}
        </div>

        <div class="col">
            <form method="get" action="{{route('show-drink-detail', $detail->drink->id)}}"><button class="btn btn-primary bg-secondary border-0" type="submit">View Drink Detail</button></form>
        </div>
    </div>
    <hr>

    @endforeach
</div>

<div class="container">
    <b>Grand Total: IDR. {{$transaction->grand_total}}</b>
</div>

@include('layouts.footer')
</body>
</html>
