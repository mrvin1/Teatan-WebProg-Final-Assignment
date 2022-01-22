@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Cart</title>
</head>
<body>

@include('layouts.navigation')
@php
    $total = 0;
@endphp

<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col fw-bold">
            Book Name
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
    @foreach($carts as $cart)
        <div class="row">
            <div class="col">
                {{$cart->drink->name}}
            </div>
            <div class="col">
                IDR {{$cart->drink->price}}
            </div>
            <div class="col">
                {{$cart->quantity}} 
            </div>
            <div class="col">
                IDR {{$cart->quantity * $cart->drink->price}}
                @php
                    $total += $cart->quantity * $cart->drink->price;
                @endphp
            </div>
            <div class="col">
                <form method="get" action="{{route('show-drink-detail', $cart->drink->id)}}">
                    <button class="btn btn-primary bg-secondary border-0" style="margin: 2%" type="submit">View Drink Detail</button>
                </form>

                <form method="get" action="{{route('show-edit-item', $cart->id)}}">
                    <button class="btn btn-primary bg-info border-0" style="margin: 2%" type="submit">Edit Quantity</button>
                </form>

                <form method="post" action="{{route('delete-item', $cart->id)}}">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-primary bg-danger border-0" style="margin: 2%" type="submit">Remove</button>
                </form>
            </div>
            <hr>
        </div>
    @endforeach
</div>

<div class="container">
    <b>Grand Total: IDR. {{$total}}</b>
</div>

<div class="container" style="margin-top: 10px">
    <form method="post" action="{{route('checkout')}}">
        @csrf
        <button class="btn btn-primary" type="submit">Checkout</button>
    </form>
</div>
</body>

@include('layouts.footer')
</html>
