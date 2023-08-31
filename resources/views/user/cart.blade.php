@extends('user/layout.app')

@section('title')
    Cart
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
    <x-page-title-background img="https://i1.sndcdn.com/visuals-000002429423-2fdYq5-t1240x260.jpg" titleName="Cart"/>
    {{-- Content --}}
    <div class="max-w-[1300px] py-20 w-full px-3 md:px-0 md:mx-auto grid grid-cols-1 lg:grid-cols-[3fr,1fr] gap-6">
        <div class="px-6 bg-white border border-solid rounded border-gray_custom py-7">
            <h2 class="text-2xl font-bold font-roboto">Your shopping cart</h2>
            <ul class="flex flex-col gap-6 pb-5">
                <li class="flex flex-col items-start mt-6 sm:flex-row sm:gap-x-10 md:gap-x-20">
                    <div class="flex">
                        <img src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="img-item" class="object-contain w-24 mr-4 border border-solid aspect-[1/1.125] border-gray_custom">
                        <div class="w-full text-base">
                            <h4>Đắc nhân tâm</h4>
                            <p class="font-normal text-gray_custom_3">Nam Mai Hoang</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-start flex-1 mt-4 md:items-center md:justify-end sm:flex-row sm:mt-0">
                        <div class="flex items-center mr-4 md:mr-0">
                            <div class="flex items-center mr-5 border border-solid rounded-sm md:mr-7">
                                <button class="flex items-center justify-center w-8 aspect-square"><i class="fa-solid fa-minus"></i></button>
                                <span class="flex items-center justify-center w-8 aspect-square">12</span>
                                <button class="flex items-center justify-center w-8 aspect-square"><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <div class="mr-0 md:mr-4 lg:mr-44 max-w-[142px] w-full">
                                <h4 class="font-semibold">200.000 đ</h4>
                                <p class="font-normal text-gray_custom_3">100.000 đ</p>
                            </div>
                        </div class="flex items-center">
                        <button class="px-6 py-[0.625rem] mt-4 sm:mt-1 md:mt-0 text-xs font-medium border border-solid rounded border-gray_custom text-red_custom bg-gray_custom_4">REMOVE</button>
                    </div>
                </li>
            </ul>
            <div class="text-base leading-6 border-t border-solid text-gray_custom_3 border-gray_custom_2">
                <div class="py-5"><i class="mr-2 text-lg fa-solid fa-truck"></i>Free Delivery within 4-5 days</div>
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</div>
            </div>
        </div>
        <div class="w-full bg-gray_custom_4">
            <div class="p-6 bg-white border border-solid rounded-md border-gray_custom">
                <p class="text-base">Have coupon?</p>
                <div class="flex mt-2 border border-solid rounded-sm border-gray_custom">
                    <input type="text" placeholder="Coupon code" class="flex-1 px-3 py-1 text-base border-r border-solid border-gray_custom">
                    <button class="px-2 text-xs font-medium text-center bg-gray_custom_4">APPLY</button>
                </div>
            </div>
            <div class="p-6 mt-4 bg-white border border-solid rounded-md border-gray_custom">
                <ul class="text-base leading-8">
                    <li class="flex justify-between"><span>Total price:</span><span>329.000 đ</span></li>
                    <li class="flex justify-between"><span>Discount:</span><span class="text-red_custom">-60.000 đ</span></li>
                    <li class="flex justify-between"><span>TAX:</span><span>14.000 đ</span></li>
                </ul>
                <div class="flex justify-between py-4 mt-5 border-t border-solid border-gray_custom">
                    <span>Total price:</span>
                    <span class="font-medium">283.000 đ</span>
                </div>
                <button class="w-full py-2 text-xs font-medium leading-5 text-white rounded font-roboto bg-green_custom">PURCHASE</button>
                <button class="w-full py-2 mt-3 text-xs font-medium leading-5 rounded font-roboto bg-gray_custom_4">BACK TO SHOP</button>
            </div>
        </div>
    </div>
     {{-- Footer --}}
@endsection
