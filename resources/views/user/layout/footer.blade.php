<div class="bg-lightPink_custom pt-[6.25rem] pb-[3.75rem] px-3 lg:px-0">
    <div class="max-w-[1300px] w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[2fr,3fr,2fr] gap-6 mx-auto">
        <div>
            <div class="flex items-start gap-1 h-[3.75rem]">
                <img src="{{asset('/assets/icon.png')}}" alt="icon"/>
                <div class="text-2xl font-extrabold text-blue_custom">
                    CAT
                </div>
                <div class="text-2xl font-light text-blue_custom">
                    Book
                </div>
            </div>
            <div class="mb-5 text-base text-blue_custom">Get the breathing space now, and we’ll extend your term at the other end year for go.</div>
            <div class="flex gap-2">
                <a href="/" class="flex items-center justify-center w-10 h-10 rounded-full item hover:bg-red_custom"><i class="fa-brands fa-facebook text-gray_custom_2 active-color"></i></a>
                <a href="/" class="flex items-center justify-center w-10 h-10 rounded-full item hover:bg-red_custom"><i class="fa-brands fa-instagram text-gray_custom_2 active-color"></i></a>
                <a href="/" class="flex items-center justify-center w-10 h-10 rounded-full item hover:bg-red_custom"><i class="fa-brands fa-linkedin-in text-gray_custom_2 active-color"></i></a>
                <a href="/" class="flex items-center justify-center w-10 h-10 rounded-full item hover:bg-red_custom"><i class="fa-brands fa-youtube text-gray_custom_2 active-color"></i></a>
            </div>
        </div>
        <div>
            <div class="font-bold text-[1.0625rem] text-blue_custom h-[3.75rem]">Book Category</div>
            <div class="grid grid-cols-2">
                <ul class="flex flex-col gap-4 text-base text-blue_custom" id="footer-types-1">
                    {{-- Hiển thị các thể loại trong hàm loadingTypes() --}}
                </ul>
                <ul class="flex flex-col gap-4 text-base text-blue_custom" id="footer-types-2">
                    {{-- Hiển thị các thể loại trong hàm loadingTypes() --}}
                </ul>
            </div>
        </div>
    <div>
        <div class="font-bold text-[1.0625rem] text-blue_custom h-[3.75rem]">Sirte Map</div>
        <ul class="flex flex-col gap-4 text-base text-blue_custom">
            <a href="{{route('home')}}" class="cursor-pointer hover:underline">Home</a>
            <a href="{{route('about')}}" class="cursor-pointer hover:underline">About Us</a>
            <a href="{{route('user_faqs')}}" class="cursor-pointer hover:underline">FAQs</a>
            <a href="{{route('blog')}}" class="cursor-pointer hover:underline">Blog</a>
            <a href="{{route('contact')}}" class="cursor-pointer hover:underline">Contact</a>
        </ul>
    </div>
    </div>
</div>
@php
    route('get-types-api');
@endphp
@pushOnce('scripts_footer')
    <script>
        const footerTypes1 = document.querySelector("#footer-types-1");
        const footerTypes2 = document.querySelector("#footer-types-2");
        function loadingTypes(api, limit='', skip='', footerType = null){
            api = api+`?skip=${skip}&limit=${limit}`;
            fetch(api)
            .then(response => response.json())
            .then(data => {
                if(footerType === 1){
                    if(data.types){
                        data.types.forEach((type)=>{
                            let htmlString = `<a href="${'/category?pagination=1&genresList='+type.id}" class="cursor-pointer hover:underline">${type.name}</a>`;
                            footerTypes1.insertAdjacentHTML('beforeend', htmlString);
                        })
                    }

                }else if(footerType === 2){
                    if(data.types){
                        data.types.forEach((type)=>{
                            let htmlString = `<a href="${'/category?pagination=1&genresList='+type.id}" class="cursor-pointer hover:underline">${type.name}</a>`;
                            footerTypes1.insertAdjacentHTML('beforeend', htmlString);
                        })
                    }
                }
                else{
                    return;
                }
            })
            .catch(error => {
                // Xử lý lỗi
                alert("Something went wrong")
            });
        }
        loadingTypes("{{ route('get-types-api') }}", 5, 0, 1);
        loadingTypes("{{ route('get-types-api') }}", 5, 5, 2);
    </script>
@endPushOnce
