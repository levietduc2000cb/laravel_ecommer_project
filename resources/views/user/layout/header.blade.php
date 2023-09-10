 {{-- Header --}}
<div>
    <header id="laptop" class="flex items-center justify-between max-w-[1300px] w-full mx-auto py-5 px-3 lg:px-0">
        <div class="items-center flex-1 block gap-8 sm:flex">
            <div class="flex items-center justify-between">
                <a href="{{route('home')}}" class="flex items-center gap-1">
                    <img src="{{asset('/assets/icon.png')}}" alt="icon"/>
                    <div class="text-2xl font-extrabold text-blue_custom">
                            CAT<span class="text-2xl font-light text-blue_custom">Book</span>
                    </div>
                </a>
                <i class="block text-3xl menu_navigation fa-solid fa-bars sm:hidden"></i>
            </div>
            <div class="mt-5 sm:mt-0 lg:mt-0 py-[0.7rem] px-5 border border-solid border-[#DEE0E6] rounded-3xl max-w-[640px] w-full flex flex-1 bg-white">
                <input class="flex-1 h-full border-0 outline-none" type="text" name="search" placeholder="Search book">
                <span class="cursor-pointer"><i class="scale-110 fa-solid fa-magnifying-glass text-red_custom"></i></span>
            </div>
            <i class="hidden text-3xl menu_navigation fa-solid fa-bars sm:block lg:hidden"></i>
        </div>
        <div class="items-center hidden gap-8 lg:flex">
            @if(auth()->check())
            <a href="{{route('user_faqs')}}" class="text-base hover:text-red_custom">FAQ</a>
            <a href="{{route('track-order')}}" class="text-base hover:text-red_custom">Track Order</a>
            <a href="{{route('cart')}}"><i class="cursor-pointer fa-solid fa-cart-shopping" style="font-size: 1.6rem"></i></a>
                <a href="{{route('user_profile')}}">
                    <img class="w-12 border border-solid rounded-full aspect-square border-red_custom" src="{{isset(auth()->user()->avatarUrl) ? asset('images/users/'.auth()->user()->avatarUrl) : asset('images/books/no-image.jpg')}}" alt="avatar">
                </a>
            @else
                <a href="{{route('login')}}" class="py-[0.65rem] text-base font-bold text-white px-7 bg-red_custom rounded-3xl">Sign in</a>
            @endif
        </div>
       </header>
       @include("user/layout/navigation")
       <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuNavigationList = document.querySelectorAll(".menu_navigation")
            const closeNavigation = document.querySelector("#close_navigation")
            function handleNavigation(){
                const navigation = document.querySelector("#navigation")
                navigation.classList.toggle("active");
            }
            menuNavigationList.forEach(menuNavigation => {
                menuNavigation.addEventListener('click', handleNavigation)
            });
            closeNavigation.addEventListener("click",handleNavigation)
        });
       </script>
</div>
