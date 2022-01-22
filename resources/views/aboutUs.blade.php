@extends('layouts.master')

@include('layouts.navigation')
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
</head>

<div style=" background-color: rgb(255, 189, 132)">
    <div class="container-md" >
        <img style="width: 100%;padding: 2%" class="mx-auto" src="{{Storage::url("banner.png")}}" alt="">
        
        <div class="text" style="padding: 1rem;padding-left: 1rem; font-size: 2rem; text-align: justify ;margin-bottom: 2rem;background-color: rgb(255, 159, 175); border-radius: 15px;">
            Teatan is a beverage product in the form of contemporary tea which is intended for all people and all ages.
            Teatan is a product that is different from existing products in general because Teatan does not open stores anywhere and in any form.
            Teatan operates completely online. Teatan sells high quality tea and uses selected tea leaves.The unique impression given by Teatan is the main highlight of the product
        </div>
        <div style="margin-bottom: 3.5rem; background-color: rgb(255, 159, 175);padding-left:1rem; border-radius: 15px">
            Contact US:
            <a style="text-decoration: none;font-size: 1.2rem;color: black " href="https://instagram.com/the_tea_tan?utm_medium=copy_link">
                <img style="width:10%;padding: 2%" class="mx-auto" src="{{Storage::url("ig.png")}}" alt=""> @the_tea_tan
            </a>
        </div>

    </div>
</div>
    
@include('layouts.footer')
