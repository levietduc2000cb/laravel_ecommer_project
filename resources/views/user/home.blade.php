@extends('user/layout.app')

@section('title')
    Home
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
    {{-- Slide Show --}}
    <div class="px-2 lg:px-0 bg-lightPink_custom">
        <ul class="flex max-w-[1280px] w-full  mx-auto overflow-hidden max-h-[600px] relative" style="height: calc(85vh - 60px)">
            <li style="background-image: url('https://preview.colorlib.com/theme/abcbook/assets/img/hero/h1_hero1.jpg.webp')" class="flex-shrink-0 object-cover w-full h-full bg-no-repeat img_slice active">
                <div class="flex flex-col items-center justify-center h-full">
                    <span class="py-[0.4rem] px-4 text-sm mb-5 bg-white rounded-3xl animationSlideUp">Science Fiction</span>
                    <h3 class="mb-8 text-6xl font-medium leading-tight text-center text-white font-playfair animationSlideUp2" style="animation-delay: 0.4s">The History<br/>of Phipino</h3>
                    <button class="py-4 font-semibold text-white rounded-full btnBeforeEffect px-11 animationScale" style="animation-delay: 0.6s">Browse Store</button>
                </div>
            </li>
            <ul class="absolute flex items-center -translate-x-1/2 bottom-7 left-1/2">
                <li class="flex items-center justify-center w-6 h-6 border border-solid rounded-full dot_slide active">
                    <span class="block w-2 h-2 bg-white rounded-full cursor-pointer"></span>
                </li>
                <li class="flex items-center justify-center w-6 h-6 border border-solid rounded-full dot_slide">
                    <span class="block w-2 h-2 bg-white rounded-full cursor-pointer"></span>
                </li>
                <li class="flex items-center justify-center w-6 h-6 border border-solid rounded-full dot_slide">
                    <span class="block w-2 h-2 bg-white rounded-full cursor-pointer"></span>
                </li>
            </ul>
        </ul>
    </div>
    {{-- Best selling books ever --}}
    <div class="py-24 overflow-hidden bg-lightPink_custom">
        <h2 class="text-3xl font-bold text-center font-playfair">Best Selling Books Ever</h2>
        <ul class="mt-[3.875rem] max-w-[1300px] w-full mx-auto flex relative">
            <li class="flex-shrink-0 w-full px-3 sm:w-1/3 md:w-1/4 lg:w-1/6">
                <div class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="flex-shrink-0 w-full px-3 sm:w-1/3 md:w-1/4 lg:w-1/6">
                <div class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="flex-shrink-0 w-full px-3 sm:w-1/3 md:w-1/4 lg:w-1/6">
                <div class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="flex-shrink-0 w-full px-3 sm:w-1/3 md:w-1/4 lg:w-1/6">
                <div class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="flex-shrink-0 w-full px-3 sm:w-1/3 md:w-1/4 lg:w-1/6">
                <div class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="flex-shrink-0 w-full px-3 sm:w-1/3 md:w-1/4 lg:w-1/6">
                <div class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <i class="absolute text-3xl -translate-y-1/2 cursor-pointer fa-solid fa-chevron-left right-full top-1/2 text-gray_custom_2 hover:text-red_custom"></i>
            <i class="absolute text-3xl -translate-y-1/2 cursor-pointer fa-solid fa-chevron-right left-full top-1/2 text-gray_custom_2 hover:text-red_custom"></i>
        </ul>
    </div>
     {{-- Featured this week --}}
     <div class="px-3 lg:px-0 pt-28 max-w-[1300px] w-full grid grid-cols-1 md:grid-cols-[3fr,1fr] md:gap-x-2 lg:gap-x-6 mx-auto">
        <div class="flex flex-col justify-end ">
            <div class="flex items-center justify-between mb-10">
                <h2 class="pl-3 text-3xl font-bold capitalize font-playfair md:pl-0">Featured This Week</h2>
                <p class="relative hidden text-base font-semibold duration-150 cursor-pointer md:block hover:tracking-wider" >View All <span class="absolute left-0 w-full h-[2px] bg-gray_custom -bottom-2"></span></p>
            </div>
            <ul class="relative pl-5 pr-5 overflow-hidden md:pl-10 lg:pl-20 bg-red_custom py-7">
                <i class="absolute text-3xl -translate-y-1/2 cursor-pointer fa-solid fa-chevron-left right-[96%] top-1/2 text-gray_custom_2 hover:text-white"></i>
                <i class="absolute text-3xl -translate-y-1/2 cursor-pointer fa-solid fa-chevron-right left-[96%] top-1/2 text-gray_custom_2 hover:text-white"></i>
                <li class="items-center gap-3 md:gap-4 lg:gap-12 md:flex">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best-books1.jpg.webp" alt="img-book">
                    <div>
                        <h2 class="font-playfair text-[2.5rem] font-medium text-white">The Rage of Dragons</h2>
                        <p class="mb-8 text-sm font-normal text-white">By Evan Winter</p>
                        <p class="text-[2rem] font-semibold text-white">$50.00</p>
                        <div class="flex items-baseline gap-1">
                            <div class="flex items-center gap-1">
                                <i class="text-sm text-white fa-solid fa-star"></i>
                                <i class="text-sm text-white fa-solid fa-star"></i>
                                <i class="text-sm text-white fa-solid fa-star"></i>
                                <i class="text-sm text-white fa-solid fa-star"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom_2"></i>
                            </div>
                            <div class="text-xs font-normal text-white">(120 Review)</div>
                        </div>
                        <button class="px-10 py-4 mt-8 text-base font-medium text-white border border-white border-solid rounded-full outline-none btnBeforeEffectTopToDown hover:text-red_custom">View Details</button>
                    </div>
                </li>
            </ul>
        </div>
        <img class="hidden object-fill h-full md:block" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/ad.jpg.webp" alt="img">
     </div>
     {{-- Lastest Published items --}}
    <div class="px-3">
         <div id="lastest-published items" class="max-w-[1300px] w-full mx-auto py-24 md:px-0">
            <div class="items-center justify-between lg:flex">
                <p class="text-3xl font-bold capitalize font-playfair">Latest Published items</p>
                <ul class="flex gap-2 mt-3 text-base font-medium lg:mt-0 text-gray_custom_3">
                    <li class="px-6 py-[0.4375rem] border border-solid rounded-full border-gray_custom cursor-pointer item active-bg active-color active-border">All</li>
                    <li class="px-6 py-[0.4375rem] border border-solid rounded-full border-gray_custom cursor-pointer">Horror</li>
                    <li class="px-6 py-[0.4375rem] border border-solid rounded-full border-gray_custom cursor-pointer">Thriller</li>
                    <li class="hidden sm:block px-6 py-[0.4375rem] border border-solid rounded-full border-gray_custom cursor-pointer">Science Fiction</li>
                    <li class="hidden md:block px-6 py-[0.4375rem] border border-solid rounded-full border-gray_custom cursor-pointer">History</li>
                </ul>
            </div>
            <ul class="grid w-full grid-cols-1 mx-auto mt-10 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-7">
                <li class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="bg-white cursor-pointer item">
                    <img class="object-cover w-full" src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/best_selling1.jpg.webp" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">Moon Dance</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">J. R Rain</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">$50</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="text-center"><button class="px-10 py-4 mt-8 text-base font-medium border border-solid rounded-full outline-none text-red_custom border-red_custom btnBeforeEffectTopToDown hover:text-white after:bg-red_custom">Browse More</button></div>
         </div>
    </div>
     {{-- Advertise --}}
     {{-- Advertise 1 --}}
    <div class="px-3">
         <div class="md:px-0 grid lg:grid-cols-2 grid-cols-1 gap-6 advertise_1 max-w-[1300px] w-full mx-auto">
            <div class="flex flex-col md:flex-row gap-8 items-center justify-between w-full px-12 h-[11.75rem] py-2 md:py-0 bg-no-repeat bg-center bg-cover" style="background-image: url('https://preview.colorlib.com/theme/abcbook/assets/img/gallery/wants-bg1.jpg.webp');">
                <p class="font-medium text-[2rem] text-white text-center">The History of Phipino</p>
                <a href="/" class="flex items-center justify-center px-8 py-4 text-base font-medium text-white rounded-full bg-red_custom btnBeforeEffect">View Detail</a>
            </div>
            <div class="flex flex-col md:flex-row gap-8 items-center justify-between w-full px-12 h-[11.75rem] py-2 md:py-0 bg-no-repeat bg-center bg-cover" style="background-image: url('https://preview.colorlib.com/theme/abcbook/assets/img/gallery/wants-bg1.jpg.webp'); ">
                <p class="font-medium text-[2rem] text-white text-center">The History of Phipino</p>
                <a href="/" class="flex items-center justify-center px-8 py-4 text-base font-medium text-white rounded-full btnBeforeEffect">View Detail</a>
            </div>
         </div>
    </div>
     {{-- Advertise 2 --}}
     <div class="relative mt-8 advertise_2">
        <div class="max-w-[1300px] px-3 md:px-0 w-full mx-auto flex flex-col items-center py-[4.6875rem]" style="background-image: url('https://preview.colorlib.com/theme/abcbook/assets/img/gallery/section-bg1.jpg.webp')">
            <h2 class="mb-6 text-[2.5rem] font-medium font-playfair text-white">Join Us</h2>
            <p class="mb-5 text-base font-normal text-center text-gray_custom_2">Discover a world of knowledge and a love for books at our store<br/>where you can find thousands of books across a wide range of subjects, from literature to science, business and art<br/>to meet all your reading needs.</p>
            <form action="/" method="POST" class="flex flex-col items-center gap-3 md:flex-row">
                <input type="email" class="px-6 py-4 text-base font-medium border border-solid rounded-full outline-none border-gray_custom" type="text" placeholder="Enter your email">
                <button class="px-6 py-4 font-semibold text-white rounded-full bg-red_custom">Send</button>
            </form>
        </div>
        <div class="absolute bottom-0 left-0 w-full h-1/2 bg-lightPink_custom z-[-1]"></div>
     </div>
@endsection
