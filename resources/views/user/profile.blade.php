@extends('user/layout.app')

@section('title')
Profile
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
if(isset($user[0]->address)){
    $address = explode(",", $user[0]->address);
}
@endphp
{{-- Title --}}
<x-page-title-profile
    img="{{isset(auth()->user()->avatarUrl) ? asset('images/users/'.auth()->user()->avatarUrl) : asset('images/books/no-image.jpg')}}"
    titleName="Profile" />
{{-- Content --}}
<div class="max-w-[1300px] w-full mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 py-14 px-3">
    <div class="p-8 bg-white rounded-lg shadow-2xl">
        <form action="{{route('user_profile_update',['id'=>auth()->user()->id])}}" method="post"
            class="flex flex-col gap-3" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label for="avatar" class="block w-2/3 mx-auto cursor-pointer max-h-[330px]">
                <img class="object-cover w-full h-full avatar_img rounded-xl"
                    src="{{isset(auth()->user()->avatarUrl) ? asset('images/users/'.auth()->user()->avatarUrl) : asset('images/books/no-image.jpg')}}"
                    alt="avatar_square">
            </label>
            <input type="file" hidden id="avatar" name="avatar" onchange="handleUpdateAvatar(event)">
            <h3 class="text-lg font-semibold">My profilo</h3>
            <div class="flex flex-col gap-6 lg:flex-row">
                <input
                    class="flex-1 p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom"
                    type="text" placeholder="My name" name="fullName" required value="{{$user[0]->fullName}}">
                <input
                    class="flex-1 p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom"
                    type="text" placeholder="My email" name="email" required value="{{$user[0]->email}}">
            </div>
            <input
                class="w-full p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom"
                type="text" placeholder="My province" name="province"
                value="{{isset($address[0])?$address[0]:'Empty'}}">
            <input
                class="w-full p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom"
                type="text" placeholder="My town" name="town" value="{{isset($address[1])?$address[1]:'Empty'}}">
            <input
                class="w-full p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom"
                type="text" placeholder="My district" name="district"
                value="{{isset($address[2])?$address[2]:'Empty'}}">
            <input
                class="w-full p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom"
                type="text" placeholder="My location" name="location"
                value="{{isset($address[3])?$address[3]:'Empty'}}">
            <button type="submit"
                class="py-3 mx-auto text-white rounded-full px-9 bg-red_custom hover:bg-darkRed_custom">Save</button>
        </form>
    </div>
    <div>
        <div class="hidden p-8 rounded-lg shadow-xl md:block">
            <div class="flex items-center justify-between py-2 border-b border-solid border-gray_custom_2">
                <h3 class="text-lg font-semibold">My bills</h3>
                <span class="w-3 rounded-full aspect-square bg-blue_custom"></span>
            </div>
            <ul class="flex flex-col gap-4 max-h-[250px] overflow-y-scroll no-scrollbar" id="my_orders">
                <div id="list_orders" class="flex flex-col gap-4">
                    @if ($orders && count($orders)>0)
                        @foreach($orders as $key => $order)
                            <li class="flex items-center justify-between py-2 gap-x-3">
                                <div>
                                    <div class="text-base font-semibold">Bill #{{$order->id}}</div>
                                    <div class="text-sm text-gray_custom_2">{{$order->created_at}}</div>
                                </div>
                                <div class="flex items-center h-full">
                                    @if ($order->status == 0)
                                        <span class="py-1 text-white rounded-full w-[128px] text-center" style="background: linear-gradient(to right,red,red )">Placed</span>
                                    @elseif($order->status == 1)
                                        <span class="py-1 text-white rounded-full w-[128px] text-center" style="background: linear-gradient(to right, red,blue)">Shipped</span>
                                    @else
                                        <span class="py-1 text-white rounded-full w-[128px] text-center" style="background: linear-gradient(to right, blue,blue )">Delivered</span>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    @else
                    @endif
                </div>
            </ul>
            <div id="loading_orders" class="text-center" style="display: none">
                Loading...
            </div>
        </div>
        <div class="p-8 rounded-lg shadow-xl">
            <div class="flex items-center justify-between py-2 border-b border-solid border-gray_custom_2">
                <h3 class="text-lg font-semibold">My account</h3>
                <span class="w-3 rounded-full aspect-square bg-red_custom"></span>
            </div>
            <form action="{{route('user_password_update')}}" method="post" class="w-full">
                @csrf
                @method('put')
                <input
                    class="w-full p-2 mt-3 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom"
                    type="text" placeholder="My password" name="password">
                <input
                    class="w-full p-2 mt-3 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom"
                    type="text" placeholder="My new password" name="new_password">
                <div class="text-center">
                    <button type="submit"
                        class="px-4 py-2 mt-4 text-white rounded-full bg-red_custom hover:bg-darkRed_custom">Change</button>
                </div>
            </form>
        </div>
        <form onsubmit="handleLogOut(event)" action="{{route('handle-logout')}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="w-full py-2 mt-3 text-center text-white rounded bg-blue_custom">Log
                out</button>
        </form>
    </div>
</div>
{{-- Footer --}}
@if(session('ms_error'))
<x-toast type="error" msg="{{session('ms_error')}}" />
@endif

{{-- Notification when success --}}
@if(session('msg'))
<x-toast type="infor" msg="{{session('msg')}}" />
@endif
@endsection

@once
@push('scripts')
<script src="{{asset('/js/custom.js')}}"></script>
<script>
    function handleUpdateAvatar(event){

        let avatarFile = event.target.files[0];

        let urlAvatar = URL.createObjectURL(avatarFile);

        let imgElement = document.querySelector(".avatar_img");

        imgElement.src = urlAvatar;
    }

    function handleLogOut(e){
        e.preventDefault();
        localStorage.clear();
        e.target.submit()
    }
</script>
@endpush
@endonce

@pushOnce('scripts_footer')
    <script>
        let myOrders = document.getElementById("my_orders");
        let loadingOrders = document.getElementById("loading_orders");
        let userId = @json(auth()->user()->id);
        let paginationOrders = 1;
        myOrders.addEventListener("scroll", function(event) {
            const {scrollHeight, scrollTop, clientHeight} = event.target;
            //Handle end scroll
            if (Math.abs(scrollHeight - clientHeight - scrollTop) < 1) {
                //Display loading orders
                loadingOrders.style.display = "block";
                //Get csrftoken when send get my orders
                const csrfToken = document.cookie.split(';')
                .map(cookie => cookie.trim())
                .find(cookie => cookie.startsWith('XSRF-TOKEN='))
                .split('=')[1];

                fetch(`/track-order/orders/${userId}?pagination=${paginationOrders}`, {
                    headers: {
                        'X-XSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                    }).then(response => {
                        return response.json();
                    }).then((data)=>{
                        if(data.orders && data.orders.length > 0){
                            data.orders.forEach((order)=>{
                                let htmlString = `
                                <li class="flex items-center justify-between py-2 gap-x-3">
                                    <div>
                                        <div class="text-base font-semibold">Bill #${order.id}</div>
                                        <div class="text-sm text-gray_custom_2">${order.created_at}</div>
                                    </div>
                                    <div class="flex items-center h-full">
                                        ${renderStatusOrder(order.status)}
                                    </div>
                                </li>
                                `;
                                myOrders.insertAdjacentHTML('beforeend', htmlString);
                            })
                        }
                    })
                    .catch(error => {
                        alert("Lấy thông tin các đơn hàng thất bại")
                    }).finally(() => {
                        loadingOrders.style.display = "none";
                        paginationOrders+=1;
                });

            }
        })

    </script>
@endPushOnce
