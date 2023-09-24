@extends('admin/layout.app')

@section('title')
    Detail order
@endsection

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection

@section('header')
    {{-- Header --}}
    <x-admin-header title="Detail order"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')
@php
    $products = json_decode($order->products);
    echo count($products);
    $totalPrice = 0;
    for ($i=0; $i < count($products) ; $i++) {
        $totalPrice += (int)$products[$i]->price * (int)$products[$i]->quantity;
    }

@endphp
    {{-- Title --}}
    {{-- Content --}}
    <main>
        <table class="w-full mt-3 border-collapse table-auto">
            <thead>
              <tr class="text-left text-white bg-blue_custom">
                <th class="hidden pl-3 sm:table-cell">Customers</th>
                <th class="text-center">Book</th>
                <th class="hidden text-center sm:table-cell">Author</th>
                <th class="hidden text-center md:table-cell">Address</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
                <th class="hidden pr-4 text-end md:table-cell">Create at</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($products) && count($products)>0)
                @foreach($products as $key => $product)
                <tr class="bg-white cursor-pointer">
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2 py-2 pl-3">
                            <img class="hidden object-cover w-12 rounded-full md:block aspect-square" src="{{asset('images/users/'.$order->avatarUrl)}}" alt="avatar_customer">
                            <span class="font-bold">{{$order->fullName}}</span>
                        </div>
                    </td>
                    <td class="py-4 font-bold text-center sm:py-0">{{$products[0]->name}}</td>
                    <td class="hidden font-bold text-center capitalize sm:table-cell">{{$products[0]->author}}</td>
                    <td class="hidden text-center capitalize md:table-cell">{{explode(",", $order->address)[3]}}</td>
                    <td class="text-center capitalize md:table-cell">{{convertToMoney((int)$products[0]->price)}}</td>
                    <td class="text-center capitalize md:table-cell">{{convertToMoney((int)$products[0]->quantity)}}</td>
                    <td class="text-center capitalize md:table-cell">{{convertToMoney((int)$products[0]->price * $products[0]->quantity)}}</td>
                    <td class="hidden text-right md:table-cell">{{convertDateTime($order->created_at)}}</td>
                </tr>
                @endforeach
                @else
                <tr class="bg-white border border-solid border-gray_custom">
                    <td colspan="7" class="py-6 text-center">No orders available</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="border-t border-black border-solid">
            <div class="py-2 text-right text-darkRed_custom">Total: {{convertToMoney($totalPrice)}}</div>
        </div>
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-4 sm:gap-3 md:gap-4">
            <a href="{{route('admin_orders')}}" class="w-full py-2 text-center text-white rounded hover:opacity-95 bg-gray_custom_2">Back</a>
            <form action="{{route('admin_order_update_status',['id'=>$order->id])}}" method="POST" class="{{$order->status==2 ? 'cursor-not-allowed' : ''}} sm:inline-block">
                @csrf
                @method('put')
                <button type="submit" class="w-full py-2 text-center text-white rounded hover:opacity-95 bg-orange_custom {{$order->status==2?"opacity-50 pointer-events-none":'opacity-100'}}" @disabled((int)$order->status==2)>Change status</button>
            </form>
            <button class="w-full py-2 text-center text-white rounded hover:opacity-95 bg-blue_custom">Print</button>
            <button type="button" onclick="openModalDelete(`Order : {{$order->id}}`,'{{$order->id}}','{{route('admin_orders_destroy',$order->id)}}')" class="w-full py-2 text-center text-white rounded hover:opacity-95 bg-red_custom">Delete</button>
        </div>
    </main>
{{-- Footer --}}
{{-- Modal Delete --}}
{{-- In Modal Delete has openModalDelete function --}}
<x-contain-modal-delete/>
{{-- Notification when has error --}}
@if(session('ms_error'))
    <x-toast type="error" msg="{{session('ms_error')}}"/>
@endif

{{-- Notification when success --}}
@if(session('msg'))
    <x-toast type="infor" msg="{{session('msg')}}"/>
@endif
@endsection



