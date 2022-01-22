@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction History</title>
</head>
<body>

@include('layouts.navigation')

<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col fw-bold">
            Transaction ID
        </div>

        <div class="col fw-bold">
            Date
        </div>

        <div class="col fw-bold">
            Action
        </div>
    </div>

    <hr style="border: 1px solid black">
</div>

<div class="container">
    @foreach($transactions as $tr)
        <div class="row">

            <div class="col">
                {{$tr->id}}
            </div>

            <div class="col">
                {{$tr->getCreatedAtAttribute()}}
            </div>

            <div class="col">
                <form method="get" action="{{route('show-transaction-detail', $tr->id)}}">
                    <button class="btn btn-primary bg-secondary border-0" type="submit">View Transaction Detail</button>
                </form>
            </div>
        </div>

        <hr>
    @endforeach
</div>

@include('layouts.footer')

</body>
</html>
