@extends('admin/layout.app')

@section('title')
    Orders
@endsection

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection

@section('header')
    {{-- Header --}}
    <x-admin-header title="Orders"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')
@php
    if (isset($pagination) && (int)$pagination>1){
        $pagination = $pagination;
    }else{
        $pagination = null;
    }
    if(!isset($search)){
        $search = null;
    }
@endphp
    {{-- Title --}}
    {{-- Content --}}
    <main>
        <form action="{{route('admin_orders')}}" class="flex border border-solid rounded border-gray_custom_2">
            <input id="text_search_orders" type="text" class="flex-1 px-2 border-none outline-none sm:px-4" placeholder="All/Order's ID/Customer's Name" value="{{$search}}" name="search">
            <select name="search_classification" title="search_classification" id="search_classification" class="text-center border border-solid outline-none w-11 sm:w-20 border-gray_custom_2">
                <option value="1" class="text-center" @selected($search_classification==1)>Id</option>
                <option value="2" class="text-center" @selected($search_classification==2)>User</option>
              </select>
            <button type="submit" title="search_for_order" class="w-11 sm:w-auto h-9 aspect-[2/1] bg-gray_custom hover:bg-gray_custom_3 hover:text-white" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <table class="w-full mt-3 border-collapse table-auto">
            <thead>
              <tr class="text-left text-white bg-blue_custom">
                <th class="hidden pl-3 sm:table-cell">Customers</th>
                <th>Orders ID</th>
                <th class="hidden sm:table-cell">Status</th>
                <th class="hidden md:table-cell">Address</th>
                <th>Price</th>
                <th class="hidden md:table-cell">Create at</th>
                <th class="pr-4 text-end">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(isset($orders) && count($orders)>0)
                @foreach($orders as $key => $order)
                <tr class="bg-white cursor-pointer">
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2 py-2 pl-3">
                            <img class="hidden object-cover w-12 rounded-full md:block aspect-square" src="{{asset('images/users/'.$order->avatarUrl)}}" alt="avatar_customer">
                            <span class="font-bold">{{$order->fullName}}</span>
                        </div>
                    </td>
                    <td class="font-bold">#{{$order->id}}</td>
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2">
                            <span class="status_order w-2 rounded-full aspect-square {{handleStatusOrder((int)$order->status)}}"></span>
                            <span class="capitalize">{{handleStatusOrder((int)$order->status)}}</span>
                        </div>
                    </td>
                    <td class="hidden capitalize md:table-cell">{{explode(",", $order->address)[3]}}</td>
                    <td class="capitalize md:table-cell">{{convertToMoney((int)$order->total)}}</td>
                    <td class="hidden md:table-cell">{{convertDateTime($order->created_at)}}</td>
                    <td class="py-3 pr-4">
                        <div class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                            <form action="{{route('admin_order_update_status',['id'=>$order->id])}}" method="POST" class="{{$order->status==2 ? 'cursor-not-allowed' : ''}} sm:inline-block">
                                @csrf
                                @method('put')
                                <button type="submit" class="w-auto text-white rounded sm:px-2 sm:py-1 bg-orange_custom {{$order->status==2?"opacity-50 pointer-events-none":'opacity-100'}}" @disabled((int)$order->status==2)>Change status</button>
                            </form>
                            <a href="{{route('admin_order_show',['id'=>$order->id])}}" class="inline-block w-20 text-center text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-blue_custom">Watch</a>
                            <button type="button" onclick="openModalDelete(`Order : {{$order->id}}`,'{{$order->id}}','{{route('admin_orders_destroy',$order->id)}}')" class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="bg-white border border-solid border-gray_custom">
                    <td colspan="7" class="py-6 text-center">No orders available</td>
                </tr>
                @endif

            </tbody>
        </table>
        @if(isset($orders) && count($orders)>0)
            <div class="flex justify-center mt-5">
                <x-pagination pagination={{$pagination}} name-route="admin_orders" count={{$count}} search={{$search}}/>
            </div>
        @endif

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



