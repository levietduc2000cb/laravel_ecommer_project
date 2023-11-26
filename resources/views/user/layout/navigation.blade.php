{{-- Navigation --}}
<div id="navigation" class="fixed top-0 left-0 right-0 z-20 lg:!transition-none lg:!translate-y-0 lg:static">
    <i id="close_navigation" class="absolute flex text-3xl fa-solid fa-xmark right-3 top-3 lg:hidden"></i>
    <nav class="flex justify-center bg-lightPink_custom">
        <ul
            class="flex flex-col lg:flex-row items-center gap-0 lg:gap-11 py-[1.15rem] font-semibold text-xl md:text-base w-full lg:w-auto">
            <li class="w-full lg:w-auto"><a href="{{route('home')}}"
                    class="block w-full py-3 text-center lg:w-auto lg:py-0 hover:text-red_custom">Home</a></li>
            <li class="w-full lg:w-auto"><a href="{{route('category',["pagination"=>1])}}"
                    class="block w-full py-3 text-center lg:w-auto lg:py-0 hover:text-red_custom">Categories</a></li>
            @if(auth()->check())
            <li class="block w-full lg:w-auto lg:hidden"><a href="{{route('user_cart')}}"
                    class="block w-full py-3 text-center lg:w-auto lg:py-0 hover:text-red_custom">Cart
                    <span style="display: none" class="text-red_custom" id="count_quantity_products_mobile">
                        [0]
                    </span>
                </a>
            </li>
            <li class="block w-full lg:w-auto lg:hidden"> <a href="{{route('user_track-order')}}"
                    class="block w-full py-3 text-center lg:w-auto lg:py-0 hover:text-red_custom">Track Order</a>
            </li>
            @endif
            <li class="w-full lg:w-auto"> <a href="{{route('about')}}"
                    class="block w-full py-3 text-center lg:w-auto lg:py-0 hover:text-red_custom">About</a></li>
            <li class="w-full lg:w-auto"><a href="{{route('blog')}}"
                    class="block w-full py-3 text-center lg:w-auto lg:py-0 hover:text-red_custom">Blog</a></li>
            <li class="w-full lg:w-auto"><a href="{{route('contact')}}"
                    class="block w-full py-3 text-center lg:w-auto lg:py-0 hover:text-red_custom">Contact</a></li>
            @if(auth()->check())
            <li class="w-full lg:w-auto"><a href="{{route('user_profile')}}"
                class="block w-full py-3 text-center md:hidden lg:w-auto lg:py-0 hover:text-red_custom">Profile</a>
            </li>
            @endif
        </ul>
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //Handle product in cart(count quantity products)
            const CART_NAME = @json(env('PRODUCTS_CART'));
            let cart = JSON.parse(localStorage.getItem(CART_NAME)) || [];
            let countQuantityProducts = document.getElementById('count_quantity_products_mobile');
            if(countQuantityProducts){
                if(cart.length > 0){
                    countQuantityProducts.style.display = 'inline-block';
                    countQuantityProducts.innerText = `[${cart.length}]`;
                }
                else{
                    countQuantityProducts.style.display = 'none';
                }
            }


        });
    </script>
</div>
