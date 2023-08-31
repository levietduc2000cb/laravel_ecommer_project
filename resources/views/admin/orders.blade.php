@extends('admin/layout.app')

@section('title')
    Orders
@endsection

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection

@section('header')
    {{-- Header --}}
    <x-admin-header title="Orders"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')
    @php
    @endphp
    {{-- Title --}}
    {{-- Content --}}
    <main>
        <form class="flex border border-solid rounded border-gray_custom_2">
            <input type="text" class="flex-1 px-4 border-none outline-none" placeholder="Order's ID/Customer's Name">
            <button class="h-9 aspect-[2/1] bg-gray_custom hover:bg-gray_custom_3 hover:text-white" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
        <table class="w-full mt-3 border-collapse table-auto">
            <thead>
              <tr class="text-left text-white bg-blue_custom">
                <th class="hidden pl-3 sm:table-cell">Customers</th>
                <th>Orders ID</th>
                <th class="hidden sm:table-cell">Status</th>
                <th class="hidden md:table-cell">Address</th>
                <th>Price</th>
                <th class="hidden md:table-cell">Create at</th>
                <th class="pr-4 text-end">Action</th>
              </tr>
            </thead>
            <tbody>
                <tr class="bg-white cursor-pointer">
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2 py-2 pl-3">
                            <img class="hidden object-cover w-12 rounded-full md:block aspect-square" src="https://th.bing.com/th/id/OIP.OYGQMo9Rp4aMkzniqdnk3AHaHa?w=164&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="avatar_customer">
                            <span class="font-bold">Lê Việt Đức</span>
                        </div>
                    </td>
                    <td class="font-bold">#121212121</td>
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2">
                            <span class="w-2 rounded-full aspect-square bg-green_custom"></span>
                            <span>Shipped</span>
                        </div>
                    </td>
                    <td class="hidden capitalize md:table-cell">Hà Nội</td>
                    <td class="capitalize md:table-cell">20000</td>
                    <td class="hidden md:table-cell">23/23/2023</td>
                    <td class="py-3 pr-4">
                        <div class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                            <button class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-blue_custom">Watch</button>
                            <button class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr class="cursor-pointer bg-gray_custom_4">
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2 py-2 pl-3">
                            <img class="hidden object-cover w-12 rounded-full md:block aspect-square" src="https://th.bing.com/th/id/OIP.OYGQMo9Rp4aMkzniqdnk3AHaHa?w=164&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="avatar_customer">
                            <span class="font-bold">Lê Việt Đức</span>
                        </div>
                    </td>
                    <td class="font-bold">#121212121</td>
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2">
                            <span class="w-2 rounded-full aspect-square bg-green_custom"></span>
                            <span>Shipped</span>
                        </div>
                    </td>
                    <td class="hidden capitalize md:table-cell">Hà Nội</td>
                    <td class="capitalize md:table-cell">20000</td>
                    <td class="hidden md:table-cell">23/23/2023</td>
                    <td class="py-3 pr-4">
                        <div class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                            <button class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-blue_custom">Watch</button>
                            <button class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr class="bg-white cursor-pointer">
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2 py-2 pl-3">
                            <img class="hidden object-cover w-12 rounded-full md:block aspect-square" src="https://th.bing.com/th/id/OIP.OYGQMo9Rp4aMkzniqdnk3AHaHa?w=164&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="avatar_customer">
                            <span class="font-bold">Lê Việt Đức</span>
                        </div>
                    </td>
                    <td class="font-bold">#121212121</td>
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2">
                            <span class="w-2 rounded-full aspect-square bg-green_custom"></span>
                            <span>Shipped</span>
                        </div>
                    </td>
                    <td class="hidden capitalize md:table-cell">Hà Nội</td>
                    <td class="capitalize md:table-cell">20000</td>
                    <td class="hidden md:table-cell">23/23/2023</td>
                    <td class="py-3 pr-4">
                        <div class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                            <button class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-blue_custom">Watch</button>
                            <button class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr class="cursor-pointer bg-gray_custom_4">
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2 py-2 pl-3">
                            <img class="hidden object-cover w-12 rounded-full md:block aspect-square" src="https://th.bing.com/th/id/OIP.OYGQMo9Rp4aMkzniqdnk3AHaHa?w=164&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="avatar_customer">
                            <span class="font-bold">Lê Việt Đức</span>
                        </div>
                    </td>
                    <td class="font-bold">#121212121</td>
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2">
                            <span class="w-2 rounded-full aspect-square bg-green_custom"></span>
                            <span>Shipped</span>
                        </div>
                    </td>
                    <td class="hidden capitalize md:table-cell">Hà Nội</td>
                    <td class="capitalize md:table-cell">20000</td>
                    <td class="hidden md:table-cell">23/23/2023</td>
                    <td class="py-3 pr-4">
                        <div class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                            <button class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-blue_custom">Watch</button>
                            <button class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-center mt-5">
            <div class="flex items-center h-6">
              <a href="/" class="flex items-center justify-center mt-1 w-7"><i class="fa-solid fa-angles-left"></i></a>
              <a href="/" class="flex items-center justify-center font-semibold w-7">1</a>
              <a href="/" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2">2</a>
              <a href="/" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2">3</a>
              <a href="/" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2">4</a>
              <a href="/" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2">5</a>
              <a href="/" class="flex items-center justify-center mt-1 w-7 "><i class="fa-solid fa-angles-right"></i></a>
            </div>
        </div>
    </main>
     {{-- Footer --}}
@endsection





