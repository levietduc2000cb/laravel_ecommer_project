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
{{-- Title --}}
<x-page-title-background img="https://trumpwallpapers.com/wp-content/uploads/Book-Wallpaper-23-2803-x-1869.jpg"
    titleName="Track Order" />
{{-- Content --}}
<div class="max-w-[1300px] py-20 w-full px-3 md:px-0 mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
    <div class="rounded-sm shadow-xl p-7 font-playfair">
        <div
            class="flex flex-col items-center justify-center py-3 border-b border-solid md:justify-between md:flex-row border-gray_custom_2">
            <div class="text-base text-center md:text-left">
                <p class="mb-2">Order ID <span class="font-semibold">121212114</span></p>
                <p class="mb-2">Place On <span class="font-semibold">12, March 2019</span></p>
            </div>
            <a href="/" class="text-lg font-semibold capitalize hover:underline text-blue_custom">View Details</a>
        </div>
        <div class="p-5">
            <div class="flex flex-col items-center md:justify-between md:items-start md:flex-row">
                <div class="text-center">
                    <span class="mb-2 text-2xl font-bold">Bill</span>
                    <p class="text-base text-gray_custom_2">Amount: <span>1</span></p>
                    <p class="text-[1.75rem] font-bold">150.000 đ</p>
                    <p class="mb-2 text-base text-gray_custom_2">Tracking Status on: <span>11:03pm, Today</span></p>
                    <button
                        class="px-4 py-2 mb-3 border border-solid rounded outline-none hover:bg-blue_custom hover:text-white border-blue_custom text-blue_custom md:mb-0">Show
                        Detail Product</button>
                </div>
                <div class="w-[11.25rem] aspect-[1/1.5]">
                    <img class="object-fill w-full h-full"
                        src="https://kenosa.vn/app_images/product/2019/5/24/combo-sach-bac-ho-song-mai-nhung-truyen-hay-ve-bac-5-tap-101305-800-101305.jpg"
                        alt="img-order">
                </div>
            </div>
            <div></div>
        </div>
        <div class="py-5">
            <div class="flex items-center justify-center">
                <div class="flex w-10/12">
                    <div class="max-w-[50%] w-full track_order-bar active1"></div>
                    <div class="max-w-[50%] w-full track_order-bar"></div>
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
    <div class="rounded-sm shadow-xl p-7 font-playfair">
        <div
            class="flex flex-col items-center justify-center py-3 border-b border-solid md:justify-between md:flex-row border-gray_custom_2">
            <div class="text-base text-center md:text-left">
                <p class="mb-2">Order ID <span class="font-semibold">121212114</span></p>
                <p class="mb-2">Place On <span class="font-semibold">12, March 2019</span></p>
            </div>
            <a href="/" class="text-lg font-semibold capitalize hover:underline text-blue_custom">View Details</a>
        </div>
        <div class="p-5">
            <div class="flex flex-col items-center md:justify-between md:items-start md:flex-row">
                <div class="text-center">
                    <span class="mb-2 text-2xl font-bold">Bill</span>
                    <p class="text-base text-gray_custom_2">Amount: <span>1</span></p>
                    <p class="text-[1.75rem] font-bold">150.000 đ</p>
                    <p class="mb-2 text-base text-gray_custom_2">Tracking Status on: <span>11:03pm, Today</span></p>
                    <button
                        class="px-4 py-2 mb-3 border border-solid rounded outline-none hover:bg-blue_custom hover:text-white border-blue_custom text-blue_custom md:mb-0">Show
                        Detail Product</button>
                </div>
                <div class="w-[11.25rem] aspect-[1/1.5]">
                    <img class="object-fill w-full h-full"
                        src="https://kenosa.vn/app_images/product/2019/5/24/combo-sach-bac-ho-song-mai-nhung-truyen-hay-ve-bac-5-tap-101305-800-101305.jpg"
                        alt="img-order">
                </div>
            </div>
            <div></div>
        </div>
        <div class="py-5">
            <div class="flex items-center justify-center">
                <div class="flex w-10/12">
                    <div class="max-w-[50%] w-full track_order-bar active1"></div>
                    <div class="max-w-[50%] w-full track_order-bar"></div>
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
    <div class="rounded-sm shadow-xl p-7 font-playfair">
        <div
            class="flex flex-col items-center justify-center py-3 border-b border-solid md:justify-between md:flex-row border-gray_custom_2">
            <div class="text-base text-center md:text-left">
                <p class="mb-2">Order ID <span class="font-semibold">121212114</span></p>
                <p class="mb-2">Place On <span class="font-semibold">12, March 2019</span></p>
            </div>
            <a href="/" class="text-lg font-semibold capitalize hover:underline text-blue_custom">View Details</a>
        </div>
        <div class="p-5">
            <div class="flex flex-col items-center md:justify-between md:items-start md:flex-row">
                <div class="text-center">
                    <span class="mb-2 text-2xl font-bold">Bill</span>
                    <p class="text-base text-gray_custom_2">Amount: <span>1</span></p>
                    <p class="text-[1.75rem] font-bold">150.000 đ</p>
                    <p class="mb-2 text-base text-gray_custom_2">Tracking Status on: <span>11:03pm, Today</span></p>
                    <button
                        class="px-4 py-2 mb-3 border border-solid rounded outline-none hover:bg-blue_custom hover:text-white border-blue_custom text-blue_custom md:mb-0">Show
                        Detail Product</button>
                </div>
                <div class="w-[11.25rem] aspect-[1/1.5]">
                    <img class="object-fill w-full h-full"
                        src="https://kenosa.vn/app_images/product/2019/5/24/combo-sach-bac-ho-song-mai-nhung-truyen-hay-ve-bac-5-tap-101305-800-101305.jpg"
                        alt="img-order">
                </div>
            </div>
            <div></div>
        </div>
        <div class="py-5">
            <div class="flex items-center justify-center">
                <div class="flex w-10/12">
                    <div class="max-w-[50%] w-full track_order-bar active1"></div>
                    <div class="max-w-[50%] w-full track_order-bar"></div>
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
    <div class="rounded-sm shadow-xl p-7 font-playfair">
        <div
            class="flex flex-col items-center justify-center py-3 border-b border-solid md:justify-between md:flex-row border-gray_custom_2">
            <div class="text-base text-center md:text-left">
                <p class="mb-2">Order ID <span class="font-semibold">121212114</span></p>
                <p class="mb-2">Place On <span class="font-semibold">12, March 2019</span></p>
            </div>
            <a href="/" class="text-lg font-semibold capitalize hover:underline text-blue_custom">View Details</a>
        </div>
        <div class="p-5">
            <div class="flex flex-col items-center md:justify-between md:items-start md:flex-row">
                <div class="text-center">
                    <span class="mb-2 text-2xl font-bold">Bill</span>
                    <p class="text-base text-gray_custom_2">Amount: <span>1</span></p>
                    <p class="text-[1.75rem] font-bold">150.000 đ</p>
                    <p class="mb-2 text-base text-gray_custom_2">Tracking Status on: <span>11:03pm, Today</span></p>
                    <button
                        class="px-4 py-2 mb-3 border border-solid rounded outline-none hover:bg-blue_custom hover:text-white border-blue_custom text-blue_custom md:mb-0">Show
                        Detail Product</button>
                </div>
                <div class="w-[11.25rem] aspect-[1/1.5]">
                    <img class="object-fill w-full h-full"
                        src="https://kenosa.vn/app_images/product/2019/5/24/combo-sach-bac-ho-song-mai-nhung-truyen-hay-ve-bac-5-tap-101305-800-101305.jpg"
                        alt="img-order">
                </div>
            </div>
            <div></div>
        </div>
        <div class="py-5">
            <div class="flex items-center justify-center">
                <div class="flex w-10/12">
                    <div class="max-w-[50%] w-full track_order-bar active1"></div>
                    <div class="max-w-[50%] w-full track_order-bar"></div>
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
</div>
{{-- Footer --}}
@endsection