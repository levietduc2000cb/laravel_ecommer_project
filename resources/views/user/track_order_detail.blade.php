@extends('user/layout.app')

@section('title')
Track Order Detail
@endsection

@section('header')
{{-- Header --}}
@include('user/layout/header')
@endsection

@section('footer')
{{-- Footer --}}
@include('user/layout/footer')
@endsection

@section('content')
@php

function totalQuantityPrice($price,$quantity){
    return $price * $quantity;
}

  function totalOrders($products){
    $total = 0;
    for ($i=0; $i < count($products) ; $i++) {
        $total += totalQuantityPrice($products[$i]->price,$products[$i]->quantity);
    }
    return $total;
  }
@endphp
{{-- Title --}}
<x-page-title-background img="https://trumpwallpapers.com/wp-content/uploads/Book-Wallpaper-23-2803-x-1869.jpg"
    titleName="Track Order Detail" />
{{-- Content --}}
<div class="max-w-[1300px] py-20 w-full px-3 md:px-0 mx-auto">
    <div class="p-5 rounded shadow-2xl">
        <div class="flex justify-between text-lg font-bold text-center">
            <div>Order detail: <span>{{$order->id}}</span></div>
            <div>Name: <span>{{auth()->user()->fullName}}</span></div>
        </div>
        <ul>
            @foreach(json_decode($order->products) as $key => $product)
                <li class="px-3 py-3 my-3 border-2 border-solid rounded-md shadow-xl border-gray_custom_2">
                    <div class="flex items-center w-full">
                        <div class="flex justify-center w-1/4 sm:w-1/5"><img class="w-24" src="{{asset('images/books/'.$product->image)}}" alt=""></div>
                        <div class="w-1/4 text-center sm:w-1/5"><span class="hidden mr-1 sm:inline-block">Name:</span>{{$product->name}}</div>
                        <div class="hidden w-1/5 text-center sm:block"><span class="mr-1">Author</span>: {{$product->author}}</div>
                        <div class="w-1/4 text-center sm:w-1/5"><span class="hidden mr-1 sm:inline-block">Quantity:</span>{{$product->quantity}}</div>
                        <div class="w-1/4 font-semibold text-center sm:w-1/5 text-blue_custom"><span class="hidden mr-1 sm:inline-block">Price:</span>{{convertToMoney($product->price)}}</div>
                    </div>
                    <div class="my-4 text-right border-t-2 border-solid border-blue_custom">
                        <div class="mt-3 font-bold text-blue_custom">Total: {{convertToMoney(totalQuantityPrice($product->price,$product->quantity))}} đ</div >
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="w-full font-bold text-right text-darkRed_custom">
            <p>Total<span class="inline-block w-1/3 sm:w-1/5 md:w-1/6 lg:w-[10%]">{{convertToMoney(totalOrders(json_decode($order->products)))}}</span></p>
            <p>Tax<span class="inline-block w-1/3 sm:w-1/5 md:w-1/6 lg:w-[10%]">10.000 đ</span></p>
            <p>Discount<span class="inline-block w-1/3 sm:w-1/5 md:w-1/6 lg:w-[10%]">5.000 đ</span></p>
            <p>Total<span class="inline-block w-1/3 sm:w-1/5 md:w-1/6 lg:w-[10%]">{{convertToMoney(totalOrders(json_decode($order->products)) + 10000 + 5000)}} đ</span></p>
        </div>
    </div>
</div>
{{-- Footer --}}
@endsection
