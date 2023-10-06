@extends('admin/layout.app')

@section('title')
    Setting
@endsection

@pushOnce('header_link')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endPushOnce

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection


@section('header')
    {{-- Header --}}
    <x-admin-header title="Setting"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')
    @php
        $address =explode(",", auth()->user()->address);
    @endphp
    {{-- Content --}}
    <main>
        <div class="flex flex-col gap-4">
            <form action="{{route('admin_profile_update',['id'=>auth()->user()->id])}}" method="POST" class="flex-1 p-4 border border-solid rounded border-blue_custom" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h2 class="text-xl font-bold text-center text-blue_custom">Profile</h2>
                <label for="avatar" class="flex justify-center my-2">
                    <img class="w-20 border border-solid rounded-full cursor-pointer avatar_img aspect-square border-gray_custom"
                        src="{{isset(auth()->user()->avatarUrl) ? asset('images/users/'.auth()->user()->avatarUrl) : asset('images/books/no-image.jpg')}}"
                        alt="avatar_square">
                </label>
                <input placeholder="file" type="file" hidden id="avatar" name="avatar" onchange="handleUpdateAvatar(event)">
                <div>
                    <label for="fullName" class="block mb-1">Name</label>
                    <input name="fullName" class="w-full px-2 py-2 border border-solid border-gray_custom" type="text" value="{{auth()->user()->fullName}}">
                </div>
                <div>
                    <label for="email" class="block mb-1">Email</label>
                    <input name="email" class="w-full px-2 py-2 border border-solid border-gray_custom" type="email" value="{{auth()->user()->email}}">
                </div>
                <div>
                    <label for="province" class="block mb-1">Province</label>
                    <input name="province" value="{{$address[0]}}" class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <div>
                    <label for="town" class="block mb-1">Town</label>
                    <input name="town" value="{{$address[1]}}" class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <div>
                    <label for="district" class="block mb-1">District</label>
                    <input name="district" value="{{$address[2]}}" class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <div>
                    <label for="location" class="block mb-1">Location</label>
                    <input name="location" value="{{$address[3]}}" class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <button type="submit" class="w-full px-6 py-3 mt-4 text-white rounded-md bg-blue_custom">Save</button>
            </form>
            <form action="{{route('admin_password_update')}}" method="POST" class="flex-1 p-4 border border-solid rounded border-red_custom">
                @csrf
                @method('put')
                <h2 class="text-xl font-bold text-center text-darkRed_custom">Setting</h2>
                <div>
                    <label for="password" class="block mb-1">Password</label>
                    <input name="password" class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <div>
                    <label for="new_password" class="block mb-1">New Password</label>
                    <input name="new_password" class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <button type="submit" class="w-full px-6 py-3 mt-4 text-white rounded-md bg-darkRed_custom">Save</button>
            </form>
        </div>
    </main>

@if(session('ms_error'))
<x-toast type="error" msg="{{session('ms_error')}}" />
@endif

{{-- Notification when success --}}
@if(session('msg'))
<x-toast type="infor" msg="{{session('msg')}}" />
@endif
     {{-- Footer --}}
@endsection
@pushOnce('scripts')
<script>
    function handleUpdateAvatar(event){

        let avatarFile = event.target.files[0];

        let urlAvatar = URL.createObjectURL(avatarFile);

        let imgElement = document.querySelector(".avatar_img");

        imgElement.src = urlAvatar;
    }
</script>
@endPushOnce





