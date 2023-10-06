@extends('user/layout.app')

@section('title')
Track Order
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
//Set status first div
function setProcessBar1($status){
    if($status == 0){
    return 'active1';
    }
    else if($status >= 1){
    return 'active1 active2 active';
    }
    return ;
}
//Set status second div
function setProcessBar2($status){
    if($status == 2){
    return 'active active3';
    }
    return ;
}
function countQuantity($products){
    $count = 0;
    for ($i=0; $i < count($products); $i++) {
        $count +=  intval($products[$i]->quantity);
    }
    return $count;
}

@endphp
{{-- Title --}}
<x-page-title-background img="https://trumpwallpapers.com/wp-content/uploads/Book-Wallpaper-23-2803-x-1869.jpg"
    titleName="Track Order" />
{{-- Content --}}
<div class="max-w-[1300px] py-20 w-full px-3 md:px-0 mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
    @foreach($orders as $key => $order)
    <div class="rounded-sm shadow-xl p-7 font-playfair">
        <div
            class="flex flex-col items-center justify-center py-3 border-b border-solid md:justify-between md:flex-row border-gray_custom_2">
            <div class="text-base text-center md:text-left">
                <p class="mb-2">Order ID <span class="font-semibold">{{$order->id}}</span></p>
                <p class="mb-2">Place On <span class="font-semibold">{{$order->created_at}}</span></p>
            </div>
            <a href="{{route('user_track-order_detail',['id'=>$order->id])}}" class="text-lg font-semibold capitalize hover:underline text-blue_custom">View Details</a>
        </div>
        <div class="p-5">
            <div class="flex flex-col items-center md:justify-between md:items-start md:flex-row">
                <div class="text-center">
                    <span class="mb-2 text-2xl font-bold">Bill</span>
                    <p class="text-base text-gray_custom_2">Amount:
                        <span>
                            {{countQuantity(json_decode($order->products))}}
                        </span>
                    </p>
                    <p class="text-[1.75rem] font-bold">{{convertToMoney($order->total + 5000 + 10000)}} đ</p>
                    <p class="mb-2 text-base text-gray_custom_2">Tracking Status on: <span>{{date('h:i A')}},
                            Today</span></p>
                    <a href="{{route('user_track-order_detail',['id'=>$order->id])}}"
                        class="px-4 py-2 mb-3 border border-solid rounded outline-none hover:bg-blue_custom hover:text-white border-blue_custom text-blue_custom md:mb-0">Show
                        Detail Product</a>
                </div>
                <div class="w-[11.25rem] aspect-[1/1.5]">
                    <img class="object-contain w-full h-full"
                        src="{{asset('images/books/'.json_decode($orders[0]->products)[0]->image)}}" alt="img-order">
                </div>
            </div>
            <div></div>
        </div>
        <div class="py-5">
            <div class="flex items-center justify-center">
                <div class="flex w-10/12">
                    <div class="max-w-[50%] w-full track_order-bar {{setProcessBar1($order->status)}}"></div>
                    <div class="max-w-[50%] w-full track_order-bar {{setProcessBar2($order->status)}}"></div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-10">
                <div class="flex w-10/12">
                    <div class="max-w-[50%] w-full track_order_content"></div>
                    <div class="max-w-[50%] w-full track_order_content"></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{-- Footer --}}
@endsection
