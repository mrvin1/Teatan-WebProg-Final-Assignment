@extends('layouts.master')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drink Detail</title>
</head>
<body style="padding-bottom: 120px;">

@include('layouts.navigation')

<div class="container border p-2" style="margin-top: 50px">

    <h2>{{$drink->name}} Detail</h2>

    <br>

    <div class="container" style=" height:100%">
        @if(Auth::guest() || Auth::user()->role == 'user')
            <div class="row">
                <div class="col-4">
                    <img style="width: 170px; height: 300px" src="{{Storage::url($drink->cover)}}">
                </div>

                <div class="col-8">
                    <div class="row">
                        <div class="col">
                            Name:
                        </div>

                        <div class="col">
                            {{$drink->name}}
                        </div>
                    </div>

              

                    <div class="row" style="margin-top: 10px">
                        <div class="col">
                            Description:
                        </div>

                        <div class="col">
                            {{$drink->synopsis}}
                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px">
                        <div class="col">
                            Price:
                        </div>

                        <div class="col">
                            IDR. {{$drink->price}}
                        </div>
                    </div>

                    @if(!Auth::guest() && Auth::user()->role == 'user')
                        <div class="row" style="margin-top: 10px">
                            <form method="post" action="{{route('add-item', $drink->id)}}">
                                @csrf
                                <div class="row mb-3">

                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"
                                                  id="inputGroup-sizing-default">Quantity</span>

                                            <input type="number" class="form-control" aria-label="Sizing example input"
                                                   aria-describedby="inputGroup-sizing-default" name="quantity">
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>

        @endif

        @if(!Auth::guest() && Auth::user()->role == 'admin')
            <form method="post" action="{{route('update-drink-detail', $drink->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="{{$drink->name}}">
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="synopsis" name="synopsis"
                                  rows="3">{{$drink->synopsis}}</textarea>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control" id="price" value="{{$drink->price}}">
                    </div>
                </div>

                <div class="row mb-10">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Drink Image:</label>
                    <div class="col-sm-10" >
                        <img style="width: 150px; height: 250px; padding-bottom: 1rem" src="{{Storage::url($drink->cover)}}">
                        <input class="form-control pt-10" type="file" id="cover" name="cover">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        @endif


    </div>


</div>

</body>

@include('layouts.footer')
</html>
