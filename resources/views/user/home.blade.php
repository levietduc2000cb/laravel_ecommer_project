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
    <ul class="flex max-w-[1280px] w-full pb-8 mx-auto overflow-hidden max-h-[600px] relative"
        style="height: calc(85vh - 60px)">
        <ul class="flex w-full overflow-hidden">
            @foreach($bannerBooks as $key=>$bannerBook)
            <li style="{{ $key == 0 ? 'display: grid' : 'display:none'}}"
                class="flex-shrink-0 object-cover w-full h-full grid-cols-1 gap-3 sm:grid-cols-2 item_dot_img img_slice">
                <div class="h-full">
                    <img class="object-contain h-full" src="{{asset('images/books/'.$bannerBook->image[0])}}"
                        alt="img_banner">
                </div>
                <div class="flex-col items-center justify-center hidden h-full sm:flex">
                    <span
                        class="py-[0.4rem] px-4 text-sm mb-5 bg-white rounded-3xl animationSlideUp">{{$bannerBook->typeBook}}</span>
                    <h3 class="mb-8 text-6xl font-medium leading-tight text-center text-black font-playfair animationSlideUp2"
                        style="animation-delay: 0.4s">Book<br />{{$bannerBook->name}}</h3>
                    <a href="{{route('book_detail',['id'=>$bannerBook->id])}}"
                        class="py-4 font-semibold text-white rounded-full btnBeforeEffect px-11 animationScale"
                        style="animation-delay: 0.6s">Watch More</a>
                </div>
            </li>
            @endforeach
        </ul>
        <ul class="absolute bottom-0 flex items-center -translate-x-1/2 left-1/2">
            <li
                class="flex items-center justify-center w-6 h-6 border border-solid rounded-full dot-item dot_slide active">
                <span class="block w-2 h-2 rounded-full cursor-pointer bg-darkRed_custom"></span>
            </li>
            <li class="flex items-center justify-center w-6 h-6 border border-solid rounded-full dot-item dot_slide">
                <span class="block w-2 h-2 rounded-full cursor-pointer bg-darkRed_custom"></span>
            </li>
            <li class="flex items-center justify-center w-6 h-6 border border-solid rounded-full dot-item dot_slide">
                <span class="block w-2 h-2 rounded-full cursor-pointer bg-darkRed_custom"></span>
            </li>
        </ul>
    </ul>
</div>
{{-- Best selling books ever --}}
<div class="py-24 overflow-hidden bg-lightPink_custom">
    <h2 class="text-3xl font-bold text-center font-playfair">Best Selling Books Ever</h2>
    <div class="relative mt-[3.875rem] max-w-[1300px] sm:mx-auto overflow-hidden px-3 mx-2">
        <div class="flex w-full item_best_selling_container">
            @foreach($bestSellingBooks as $key => $bestSellingBook)
            <a href="{{route('book_detail',['id'=>$bestSellingBook->id])}}"
                class="flex-shrink-0 w-full px-2 sm:px-3 item_best_selling sm:w-1/3 md:w-1/4 lg:w-1/5">
                <div class="bg-white cursor-pointer item">
                    <img class="object-contain w-full aspect-[2/3]"
                        src="{{asset('images/books/'.$bestSellingBook->image[0])}}" alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair truncate">
                            {{$bestSellingBook->name}}</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">{{$bestSellingBook->author}}</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                @for($i = 1; $i <= 5; $i++)
                                    @if ($i<=$bestSellingBook->star)
                                        <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                    @else
                                        <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">{{$bestSellingBook->totalComment}}</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">
                                    ${{convertToMoney(calculatorPrice((float)$bestSellingBook->price,(float)$bestSellingBook->sale))}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <i onclick="onClickSlideLeft()"
            class="absolute left-0 text-3xl -translate-y-1/2 cursor-pointer fa-solid fa-chevron-left top-1/2 text-gray_custom_2 hover:text-red_custom"></i>
        <i onclick="onClickSlideRight()"
            class="absolute right-0 text-3xl -translate-y-1/2 cursor-pointer fa-solid fa-chevron-right top-1/2 text-gray_custom_2 hover:text-red_custom"></i>
    </div>
</div>
{{-- Featured this week --}}
<div class="lg:px-0 pt-28 max-w-[1300px] w-full grid grid-cols-1 md:grid-cols-[3fr,1fr] md:gap-x-2 lg:gap-x-6 mx-auto">
    <div class="flex flex-col justify-end ">
        <div class="flex items-center justify-between mb-10">
            <h2 class="pl-3 text-3xl font-bold capitalize font-playfair md:pl-0">Featured This Week</h2>
            <p
                class="relative hidden text-base font-semibold duration-150 cursor-pointer md:block hover:tracking-wider">
                View All <span class="absolute left-0 w-full h-[2px] bg-gray_custom -bottom-2"></span></p>
        </div>
        <ul id="scrollable-content" style="cursor: grab"
            class="flex px-[0.65rem] overflow-x-scroll no-scrollbar gap-x-2 md:px-5 md:pl-10 lg:pl-20 bg-red_custom py-7">
            @foreach($thisWeekBooks as $key => $thisWeekBook)
            <li class="items-center flex-shrink-0 max-w-full gap-3 md:gap-4 lg:gap-12 md:flex">
                <img class="object-cover w-full sm:w-1/2 aspect-[1/1.1]"
                    src="{{asset('images/books/'.$thisWeekBook->image[0])}}" alt="img-book">
                <div>
                    <h2 class="font-playfair text-[2.5rem] font-medium text-white">{{$thisWeekBook->name}}</h2>
                    <p class="mb-8 text-sm font-normal text-white">{{$thisWeekBook->author}}</p>
                    <p class="text-[2rem] font-semibold text-white">
                        ${{convertToMoney(calculatorPrice((float)$thisWeekBook->price,(float)$thisWeekBook->sale))}}</p>
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
                    <a href="{{route('book_detail',['id'=>$thisWeekBook->id])}}"
                        class="inline-block px-10 py-4 mt-8 text-base font-medium text-white border border-white border-solid rounded-full outline-none btnBeforeEffectTopToDown hover:text-red_custom">View
                        Details</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <img class="hidden object-fill h-full md:block"
        src="https://preview.colorlib.com/theme/abcbook/assets/img/gallery/ad.jpg.webp" alt="img">
</div>
{{-- Lastest Published items --}}
<div class="px-3">
    <div id="lastest-published items" class="max-w-[1300px] w-full mx-auto py-24 md:px-0">
        <div class="items-center justify-between lg:flex">
            <p class="text-3xl font-bold capitalize font-playfair">Latest Published items</p>
            <ul class="flex gap-2 mt-3 text-base font-medium lg:mt-0 text-gray_custom_3">
                <li onclick="onClickType('',0)"
                    class="lastestSelect px-6 py-[0.4375rem] border border-solid rounded-full border-gray_custom cursor-pointer item active-bg active-color active-border">
                    All
                </li>
                @foreach($latestPublishedTypes as $key => $type)
                    <li onclick="onClickType({{$type->id}},{{$key+1}})" class="lastestSelect px-6 py-[0.4375rem] border border-solid rounded-full border-gray_custom cursor-pointer item">
                        {{$type->name}}
                    </li>
                @endforeach
            </ul>
        </div>
        <div id="slide_3" class="relative w-full overflow-x-hidden">
            <div id="slide_3_container" class="flex mt-5 transition-all cursor-default">
                @foreach($latestPublishedBooks as $key => $latestPublishedBook)
                <a href="{{route('book_detail',['id'=>$latestPublishedBook->id])}}"
                    class="flex-shrink-0 w-1/2 px-1 bg-white md:px-2 lg:px-3 sm:w-1/4 md:w-1/5 lg:w-1/5 item_slide_3">
                    <img class="object-cover w-full" src="{{asset('images/books/'.$latestPublishedBook->image[0])}}"
                        alt="item-image">
                    <div class="px-5 pt-3 pb-5">
                        <h3
                            class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair cursor-pointer truncate hover:text-darkRed_custom">
                            {{$latestPublishedBook->name}}</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">{{$latestPublishedBook->author}}</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-xl font-semibold text-red_custom">
                                    ${{convertToMoney(calculatorPrice((float)$latestPublishedBook->price,(float)$latestPublishedBook->sale))}}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <button id="slide_3_left"
                class="absolute left-0 z-10 px-2 -translate-y-1/2 bg-white border border-solid rounded-full outline-none aspect-square top-1/2 border-red_custom">
                <i class="text-xl fa-solid fa-left-long text-darkRed_custom"></i>
            </button>
            <button id="slide_3_right"
                class="absolute right-0 z-10 px-2 -translate-y-1/2 bg-white border border-solid rounded-full outline-none -0 aspect-square top-1/2 border-red_custom">
                <i class="text-xl fa-solid fa-right-long text-darkRed_custom"></i>
            </button>
        </div>
        <div class="text-center">
            <a href="{{route('category',['pagination'=>1])}}"
                class="px-10 py-4 mt-8 text-base font-medium border border-solid rounded-full outline-none text-red_custom border-red_custom btnBeforeEffectTopToDown hover:text-white after:bg-red_custom">Browse
                More
            </a>
        </div>
    </div>
</div>
{{-- Advertise --}}
{{-- Advertise 1 --}}
<div class="px-3">
    <div class="md:px-0 grid lg:grid-cols-2 grid-cols-1 gap-6 advertise_1 max-w-[1300px] w-full mx-auto">
        <div class="flex flex-col md:flex-row gap-8 items-center justify-between w-full px-12 h-[11.75rem] py-2 md:py-0 bg-no-repeat bg-center bg-cover"
            style="background-image: url('{{asset('assets/type_horror.jpg')}}');">
            <p class="font-medium text-[2rem] text-white text-center">The History of Horror</p>
            <a href="/"
                class="flex items-center justify-center px-8 py-4 text-base font-medium text-white rounded-full bg-red_custom btnBeforeEffect">View
                Detail</a>
        </div>
        <div class="flex flex-col md:flex-row gap-8 items-center justify-between w-full px-12 h-[11.75rem] py-2 md:py-0 bg-no-repeat bg-center bg-cover"
            style="background-image: url('{{asset('assets/type_love.jpg')}}'); ">
            <p class="font-medium text-[2rem] text-white text-center">The History of Love</p>
            <a href="/"
                class="flex items-center justify-center px-8 py-4 text-base font-medium text-white rounded-full btnBeforeEffect">View
                Detail</a>
        </div>
    </div>
</div>
{{-- Advertise 2 --}}
<div class="relative mt-8 advertise_2">
    <div class="max-w-[1300px] px-3 md:px-0 w-full mx-auto flex flex-col items-center py-[4.6875rem]"
        style="background-image: url('https://preview.colorlib.com/theme/abcbook/assets/img/gallery/section-bg1.jpg.webp')">
        <h2 class="mb-6 text-[2.5rem] font-medium font-playfair text-white">Join Us</h2>
        <p class="mb-5 text-base font-normal text-center text-gray_custom_2">Discover a world of knowledge and a love
            for books at our store<br />where you can find thousands of books across a wide range of subjects, from
            literature to science, business and art<br />to meet all your reading needs.</p>
        <form action="{{route('send-email-join-us')}}" method="POST"
            class="flex flex-col items-center gap-3 md:flex-row">
            @csrf
            <input type="email"
                class="px-6 py-4 text-base font-medium border border-solid rounded-full outline-none border-gray_custom"
                type="text" placeholder="Enter your email" name="email">
            <button class="px-6 py-4 font-semibold text-white rounded-full bg-red_custom">Send</button>
        </form>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-1/2 bg-lightPink_custom z-[-1]"></div>
</div>

@if(session('msg'))
<x-toast type="infor" msg="{{session('msg')}}" />
@endif
@endsection

@pushOnce('scripts')
<script src="{{asset('/js/custom.js')}}"></script>
<script>
        function onClickSlideLeft(){
            let item_best_selling_container = document.querySelector(".item_best_selling_container");
            let item_best_selling = document.querySelectorAll(".item_best_selling");
            item_best_selling_container.appendChild(item_best_selling[0]);
        }

        function onClickSlideRight(){
            let item_best_selling_container = document.querySelector(".item_best_selling_container");
            let item_best_selling = document.querySelectorAll(".item_best_selling");
            item_best_selling_container.prepend(item_best_selling[item_best_selling.length-1]);
        }

        //Get router search;
        let urlSearchBooksType = "<?php echo(route('books_type_search')) ?>";
        //Handle click to change books with type and index select
        function onClickType(type,indexKey){
            //Active select
            const lastestSelects = document.querySelectorAll(".lastestSelect");
            lastestSelects.forEach((lastestSelect, index)=>{
                lastestSelect.classList.remove("active-bg","active-color","active-border");
                if(index === indexKey){
                    lastestSelect.classList.add("active-bg","active-color","active-border");
                }
            })
            //Action items
            slide3Container.innerHTML = '<div class="flex items-center justify-center w-full h-64 font-medium text-darkRed_custom">Loading...</div>';
            const urlSearchBooksTypeQuery =  urlSearchBooksType+`?type=${type}`
            fetch(urlSearchBooksTypeQuery)
            .then((res)=>res.json())
            .then((data)=>{
                let books = '';
                let urlHref = '';
                let srcImg = '';
                let priceBook = '';

                for (const book of data) {
                    urlHref = `${window.location.origin}/book/${book.id}`;
                    srcImg = `${book.image[0] ? window.location.origin+"/images/books/"+book.image[0] : window.location.origin+"/images/books/no-image.jpg"}`;
                    priceBook = book.price - ((book.sale/100)*book.price);

                    books += `<a href="${urlHref}"
                        class="flex-shrink-0 w-1/2 px-1 bg-white md:px-2 lg:px-3 sm:w-1/4 md:w-1/5 lg:w-1/5 item_slide_3">
                        <img class="object-cover w-full" src="${srcImg}"
                            alt="item-image">
                        <div class="px-5 pt-3 pb-5">
                        <h3
                            class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair cursor-pointer truncate hover:text-darkRed_custom">
                            ${book.name}</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">${book.author}</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                ${renderStars(data.star)}
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-xl font-semibold text-red_custom">
                                    ${converToMoney(priceBook)}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>`
                }
                slide3Container.innerHTML = books;
            }).catch((err)=>{
                alert("Something went wrong")
            })
        }
</script>
@endPushOnce
@pushOnce('scripts_footer')
<script>
    //Dot Slide
        const dotsSLide = document.querySelectorAll(".dot_slide");
        const itemDotsImg = document.querySelectorAll('.item_dot_img');
        dotsSLide.forEach((dotSlide,index) => {
            dotSlide.addEventListener('click',()=>{
                itemDotsImg.forEach((itemDotImg)=>{
                    itemDotImg.style.display = 'none';
                });
                dotsSLide.forEach((dotSlide)=>{
                    dotSlide.classList.remove('active')
                });
                itemDotsImg[index].style.display = 'grid';
                dotsSLide[index].classList.add('active');
            })
        });


        //Scroll grabber
        const scrollableContent = document.getElementById('scrollable-content');
        let isDragStart =  false, prevPageX, prevScrollLeft;
        scrollableContent.addEventListener("mousedown",(e)=>{
            isDragStart = true;
            prevPageX = e.pageX;
            scrollableContent.style.cursor = 'grabbing';
            prevScrollLeft = scrollableContent.scrollLeft;
        })
        scrollableContent.addEventListener("mousemove",(e)=>{
            if(!isDragStart) return;
            e.preventDefault();
            let position = e.pageX - prevPageX;
            scrollableContent.scrollLeft = prevScrollLeft - position;
        })
        scrollableContent.addEventListener("mouseleave",(e)=>{
            isDragStart = false;
            scrollableContent.style.cursor = 'grab';
        })
        window.addEventListener("mouseup",(e)=>{
            isDragStart = false;
            scrollableContent.style.cursor = 'grab';
        })

        //Slide 3 run
        let slide3 = document.getElementById("slide_3");
        let slide3Container = document.getElementById("slide_3_container");
        let slide3Left = document.getElementById('slide_3_left');
        let slide3Right = document.getElementById('slide_3_right');
        let position = 0;
        slide3Left.addEventListener("click",(e)=>{
            let itemSlide3s = document.querySelectorAll(".item_slide_3");
            let widthContent = (itemSlide3s[0].offsetWidth ) * itemSlide3s.length;
            let withSlide3Container = slide3.offsetWidth;
            //Run slide 3 when click left
            position = position + withSlide3Container;
            if(position >= 0){
                position = 0;
            }
            slide3Container.style.transform = `translateX(${position}px)`
        })
        slide3Right.addEventListener("click",(e)=>{
            let itemSlide3s = document.querySelectorAll(".item_slide_3");
            let widthContent = (itemSlide3s[0].offsetWidth ) * itemSlide3s.length;
            let withSlide3Container = slide3.offsetWidth;
            //Run slide 3 when click right
            position = position - withSlide3Container;
            if(Math.abs(position) >= widthContent - withSlide3Container - 4){
                position = (widthContent - withSlide3Container - 4) * -1;
            }
            slide3Container.style.transform = `translateX(${position}px)`
        })

</script>
@endPushOnce
