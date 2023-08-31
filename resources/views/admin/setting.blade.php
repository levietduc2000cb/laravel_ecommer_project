@extends('admin/layout.app')

@section('title')
    Setting
@endsection

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
    {{-- Content --}}
    <main>
        <div class="flex flex-col gap-4">
            <form action="/" method="POST" class="flex-1 p-4 border border-solid rounded border-blue_custom">
                <h2 class="text-xl font-bold text-center text-blue_custom">Profile</h2>
                <div class="flex justify-center my-2"><img src="" alt="avatar" class="w-20 border border-solid rounded-full cursor-pointer aspect-square border-gray_custom"></div>
                <div>
                    <label for="name" class="block mb-1">Name</label>
                    <input class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <div>
                    <label for="name" class="block mb-1">Email</label>
                    <input class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <div>
                    <label for="name" class="block mb-1">Address</label>
                    <input class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <button type="submit" class="w-full px-6 py-3 mt-4 text-white rounded-md bg-blue_custom">Save</button>
            </form>
            <form action="" method="POST" class="flex-1 p-4 border border-solid rounded border-red_custom">
                <h2 class="text-xl font-bold text-center text-darkRed_custom">Setting</h2>
                <div>
                    <label for="name" class="block mb-1">Password</label>
                    <input class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <div>
                    <label for="name" class="block mb-1">New Password</label>
                    <input class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <div>
                    <label for="name" class="block mb-1">Repeat New Password</label>
                    <input class="w-full px-2 py-2 border border-solid border-gray_custom" type="text">
                </div>
                <button type="submit" class="w-full px-6 py-3 mt-4 text-white rounded-md bg-darkRed_custom">Save</button>
            </form>
        </div>
    </main>
     {{-- Footer --}}
@endsection





