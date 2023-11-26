<div class="bg-white border border-solid cursor-pointer item border-gray_custom">
    <img class="object-cover w-full aspect-[1/3]]" src="{{$img}}" alt="item-image">
    <div class="px-5 pt-3 pb-5">
        <a href="{{route('book_detail',['id'=>$id])}}" class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair">{{$name}}</a>
        <h4 class="text-sm font-light text-gray_custom_2">{{$author}}</h4>
        <div class="py-5">
            <div class="flex gap-1">
                @for($i = 1; $i <= 5; $i++)
                    @if ($i<=$stars)
                        <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                    @else
                        <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                    @endif
                @endfor
            </div>
            <div class="flex items-baseline justify-between">
                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">{{$reviewers}}</span>Review)</p>
                <p class="text-xl font-semibold text-red_custom">{{convertToMoney($price)}}đ</p>
            </div>
        </div>
    </div>
</div>
