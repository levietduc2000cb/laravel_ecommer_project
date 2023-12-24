{{-- Header --}}
<div>
    <header id="laptop" class="flex items-center justify-between max-w-[1300px] w-full mx-auto py-5 px-3 lg:px-0">
        <div class="items-center flex-1 block gap-8 sm:flex">
            <div class="flex items-center justify-between">
                <a href="{{route('home')}}" class="flex items-center gap-1">
                    <img src="{{asset('/assets/icon.png')}}" alt="icon" />
                    <div class="text-2xl font-extrabold text-blue_custom">
                        CAT<span class="text-2xl font-light text-blue_custom">Book</span>
                    </div>
                </a>
                <i class="block text-3xl menu_navigation fa-solid fa-bars sm:hidden"></i>
            </div>
            <div
                class="mt-5 sm:mt-0 lg:mt-0 py-[0.7rem] px-5 border border-solid border-[#DEE0E6] rounded-3xl max-w-[640px] w-full flex flex-1 bg-white">
                <div class="relative flex-1 h-full">
                    <input value="{{isset($search) ? $search : ''}}" id="book-search-name" oninput="handleSearchListBooks(event)" onblur="closeSearchListBooks()" onkeyup="handleKeyEnter(event)" class="w-full border-0 outline-none" type="text" name="search" placeholder="Search book">
                    <div onmouseover="handleMouseoverBookSearchList()" onmouseout="handleMouseOutBookSearchList()" id="list-search-bar" class="absolute left-0 right-0 top-[calc(100%+12px)] z-20 border-l-2 border-r-2 border-b-2 border-solid border-gray_custom_4 rounded">
                        {{-- Display list books --}}
                    </div>
                </div>
                <span class="cursor-pointer" onclick="handleClickSearch()">
                    <i class="scale-110 fa-solid fa-magnifying-glass text-red_custom"></i>
                </span>
            </div>
            <i class="hidden text-3xl menu_navigation fa-solid fa-bars sm:block lg:hidden"></i>
        </div>
        <div class="items-center hidden gap-8 lg:flex">
            @if(auth()->check())
            <a href="{{route('user_faqs')}}" class="text-base hover:text-red_custom">FAQ</a>
            <a href="{{route('user_track-order')}}" class="text-base hover:text-red_custom">Track Order</a>
            <a href="{{route('user_cart')}}" class="relative">
                <i class="cursor-pointer fa-solid fa-cart-shopping" style="font-size: 1.6rem"></i>
                <span id="count_quantity_products" style="display: none"
                    class="absolute top-0 px-1 text-center text-white -translate-x-1/2 -translate-y-1/2 rounded-md left-full aspect-square bg-red_custom">
                </span>
            </a>
            <a href="{{route('user_profile')}}">
                <img class="w-12 border border-solid rounded-full aspect-square border-red_custom"
                    src="{{isset(auth()->user()->avatarUrl) ? asset('images/users/'.auth()->user()->avatarUrl) : asset('images/books/no-image.jpg')}}"
                    alt="avatar">
            </a>
            @else
            <a href="{{route('login')}}"
                class="py-[0.65rem] text-base font-bold text-white px-7 bg-red_custom rounded-3xl">Sign in</a>
            @endif
        </div>
    </header>
    @include("user/layout/navigation")
    <script>
        let listSearchBar = document.querySelector("#list-search-bar");
        let setTimeOuthandleSearchListBook = null;
        let isForcus = false;

        // Prevent blur of input when mouse on list search
        function handleMouseoverBookSearchList(){
            isForcus = false;
        }

        function handleMouseOutBookSearchList(){
            isForcus = true;
        }

        //Close list books in search bar
        function closeSearchListBooks(event){
            if(isForcus){
                if(setTimeOuthandleSearchListBook){
                    clearTimeout(setTimeOuthandleSearchListBook);
                }
                listSearchBar.innerHTML = '';
                return;
            }
            return;

        }
        //Handle when press enter
        function handleKeyEnter(event){
            if(event.key.toLowerCase() === 'enter'){
                window.location.href = `/category?pagination=1&search=${event.target.value}`;
            }
            return;
        }

        //Handle when click search icon
        function handleClickSearch(){
            const searchInputNameBook = document.querySelector("#book-search-name").value;
            window.location.href = `/category?pagination=1&search=${searchInputNameBook}`;
        }

        //Handle search with input in search input
        function handleSearchListBooks(event){
            isForcus = true;
            if(setTimeOuthandleSearchListBook){
                clearTimeout(setTimeOuthandleSearchListBook);
            }
            if(event.target.value.trim()===''){
                listSearchBar.innerHTML = '';
                return;
            }
            setTimeOuthandleSearchListBook = setTimeout(() => {
                fetch(`/books/search-name?search=${event.target.value.trim()}`)
                .then((res)=>{
                    return res.json();
                }).then((datas)=>{
                    let listSearchString = `<p class="block w-full px-2 py-1 bg-white">Not find books</p>`;
                    if(datas.length > 0){
                        listSearchString = "";
                        for (let index = 0; index < datas.length; index++) {
                            listSearchString+=`<a class="block w-full px-2 py-1 bg-white hover:bg-gray_custom_4" href="/category?pagination=1&search=${datas[index].name}">${datas[index].name}</a>`
                        }
                    }
                    listSearchBar.innerHTML = listSearchString;

                })
                .catch((error)=>{
                    listSearchBar.innerHTML = `<p class="block w-full px-2 py-1 bg-white">Something went wrong</p>`
                })
            }, 700);
        }

        //Get items in carts
        document.addEventListener('DOMContentLoaded', function() {
            //Handle product in cart(count quantity products)
            const CART_NAME = @json(env('PRODUCTS_CART'));
            let cart = JSON.parse(localStorage.getItem(CART_NAME)) || [];
            let countQuantityProducts = document.getElementById('count_quantity_products');
            if(countQuantityProducts){
                if(cart.length > 0){
                countQuantityProducts.style.display = 'block';
                countQuantityProducts.innerText = cart.length;
            }
                else{
                    countQuantityProducts.style.display = 'none';
                }
            }

            //Handle menu on mobile devices
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
