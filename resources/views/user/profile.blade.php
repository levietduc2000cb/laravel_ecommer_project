@extends('user/layout.app')

@section('title')
    Blog
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
    <x-page-title-profile img="https://th.bing.com/th/id/OIP.H33ToM8hwdW580U1Tc4H3gHaHY?w=174&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" titleName="Profile"/>
    {{-- Content --}}
    <div class="max-w-[1300px] w-full mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 py-14 px-3">
        <div class="p-8 bg-white rounded-lg shadow-2xl">
            <form action="/" method="POST" class="flex flex-col gap-3">
                <label for="avatar" class="block w-2/3 mx-auto cursor-pointer max-h-[330px]">
                    <img class="object-cover w-full h-full avatar_img rounded-xl" src="https://th.bing.com/th/id/OIP.ec6hDKwm9TS-Z2Bzyk5uqAHaE7?w=270&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="">
                </label>
                <input type="file" hidden id="avatar" name="avatar" onchange="handleUpdateAvatar(event)">
                <h3 class="text-lg font-semibold">My profilo</h3>
                <div class="flex gap-x-6">
                    <input class="flex-1 p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom" type="text" placeholder="My name">
                    <input class="flex-1 p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom" type="text" placeholder="My email">
                </div>
                <input class="w-full p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom" type="text" placeholder="My province">
                <input class="w-full p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom" type="text" placeholder="My town">
                <input class="w-full p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom" type="text" placeholder="My district">
                <input class="w-full p-2 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom" type="text" placeholder="My location">
                <button class="py-3 mx-auto text-white rounded-full px-9 bg-red_custom hover:bg-darkRed_custom">Save</button>
            </form>
        </div>
        <div>
            <div class="hidden p-8 rounded-lg shadow-xl md:block">
                <div class="flex items-center justify-between py-2 border-b border-solid border-gray_custom_2">
                    <h3 class= "text-lg font-semibold">My bills</h3>
                    <span class="w-3 rounded-full aspect-square bg-blue_custom"></span>
                </div>
                <ul class="flex flex-col gap-4">
                    <li class="flex items-center justify-between py-2 gap-x-3">
                        <div>
                            <div class="text-base font-semibold">Bill #123</div>
                            <div class="text-sm text-gray_custom_2">6th November 2020</div>
                        </div>
                        <div class="flex items-center h-full">
                            <span class="py-1 text-white rounded-full w-[128px] text-center" style="background: linear-gradient(to right, red,blue )">Shipped</span>
                        </div>
                    </li>
                    <li class="flex items-center justify-between py-2 gap-x-3">
                        <div>
                            <div class="text-base font-semibold">Bill #123</div>
                            <div class="text-sm text-gray_custom_2">6th November 2020</div>
                        </div>
                        <div class="flex items-center h-full">
                            <span class="py-1 text-white rounded-full w-[128px] text-center" style="background: linear-gradient(to right,red,red )">Placed</span>
                        </div>
                    </li>
                    <li class="flex items-center justify-between py-2 gap-x-3">
                        <div>
                            <div class="text-base font-semibold">Bill #123</div>
                            <div class="text-sm text-gray_custom_2">6th November 2020</div>
                        </div>
                        <div class="flex items-center h-full">
                            <span class="py-1 text-white rounded-full w-[128px] text-center" style="background: linear-gradient(to right, blue,blue )">Delivered</span>
                        </div>
                    </li>
                    <li class="flex items-center justify-between py-2 gap-x-3">
                        <div>
                            <div class="text-base font-semibold">Bill #123</div>
                            <div class="text-sm text-gray_custom_2">6th November 2020</div>
                        </div>
                        <div class="flex items-center h-full">
                            <span class="block py-1 text-white rounded-full w-[128px] text-center" style="background: linear-gradient(to right, red,blue )">Shipped</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="p-8 rounded-lg shadow-xl">
                <div class="flex items-center justify-between py-2 border-b border-solid border-gray_custom_2">
                    <h3 class= "text-lg font-semibold">My account</h3>
                    <span class="w-3 rounded-full aspect-square bg-red_custom"></span>
                </div>
                <form action="" method="" class="w-full">
                    <input class="w-full p-2 mt-3 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom" type="text" placeholder="My password">
                    <input class="w-full p-2 mt-3 text-base border-b border-solid outline-none focus:border-blue_custom border-gray_custom" type="text" placeholder="My new password">
                    <div class="text-center">
                        <button class="px-4 py-2 mt-4 text-white rounded-full bg-red_custom hover:bg-darkRed_custom">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     {{-- Footer --}}
@endsection

@once
@push('scripts')
<script>

    function handleUpdateAvatar(event){

        let avatarFile = event.target.files[0];

        let urlAvatar = URL.createObjectURL(avatarFile);

        let imgElement = document.querySelector(".avatar_img");

        imgElement.src = urlAvatar;

    }
</script>
@endpush
@endonce
