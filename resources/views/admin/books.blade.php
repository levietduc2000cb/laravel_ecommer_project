@extends('admin/layout.app')

@section('title')
Books
@endsection

@section('sidebar')
@include('admin/layout/sidebar')
@endsection

@section('header')
{{-- Header --}}
<x-admin-header title="Books"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
@include('admin/layout/footer')
@endsection

@section('content')

<style>
    input[id="open_modal_create_book"]+#modal_create_book,
    input[id="open_modal_create_type"]+#modal_create_type {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-300px);
        transition: all 0.5s ease-in-out;
    }

    input[id="open_modal_create_book"]:checked+#modal_create_book,
    input[id="open_modal_create_type"]:checked+#modal_create_type {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    select {
        /* Ẩn giao diện mặc định của nút down */
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-repeat: no-repeat;
        background-position: 97% center;
        padding-right: 20px;
        /* Tùy chỉnh giao diện của nút down */
        background-image:url({{asset('/assets/down.svg')}});
        /* Để tạo khoảng cách giữa nút down và văn bản */
    }

</style>

@php
    if (isset($pagination) && (int)$pagination>1){
        $pagination = $pagination;
    }else{
        $pagination = null;
    }
    if(!isset($search)){
        $search = null;
    }
@endphp
{{-- Title --}}
{{-- Content --}}
<main>
    <x-admin-search-bar route-name="admin_books" search={{$search}} placeholder="Find book" route-search="/books/search-name"></x-admin-search-bar>
    <div class="flex flex-col sm:flex-row gap-x-3">
        <div class="flex justify-start mt-2">
            <label for="open_modal_create_book" class="flex items-center justify-center w-full px-2 py-2 text-white rounded cursor-pointer sm:w-auto bg-darkRed_custom">Create a new book</label>
            <input type="checkbox" id="open_modal_create_book" hidden>
            <div id="modal_create_book" class="fixed !bg-[rgba(0,0,0,0.5)] top-0 left-0 right-0 h-screen flex justify-center items-center">
                <div class="w-11/12 h-full p-4 overflow-y-scroll bg-white rounded no-scrollbar md:w-7/12">
                    <form action="{{route('admin_books_store')}}" method="post" enctype="multipart/form-data">
                        <div class="flex justify-end"><label for="open_modal_create_book"><i class="text-xl cursor-pointer fa-solid fa-xmark"></i></label></div>
                        <h2 class="mb-4 text-2xl font-bold text-center">Book</h2>
                        @csrf
                        <div class="flex flex-col gap-4 md:flex-row">
                            <div class="flex items-center w-full md:w-2/5">
                                <div class="grid items-center w-full grid-cols-2 gap-2 h-1/3 md:h-3/4">
                                    <label for="book_img_1" class="mx-auto md:w-full aspect-[1/1.125] cursor-pointer border border-solid border-gray_custom">
                                        <img class="object-fill w-full h-full" src="{{asset('images/books/no-image.jpg')}}" alt="title_img">
                                    </label>
                                    <input type="file" id="book_img_1" class="peer" name="book_img_1" accept="image/jpeg, image/png, image/gif" onchange="changeInputImg(event)" hidden>
                                    <label for="book_img_2" class="mx-auto  md:w-full aspect-[1/1.125] cursor-pointer border border-solid border-gray_custom">
                                        <img class="object-fill w-full h-full" src="{{asset('images/books/no-image.jpg')}}" alt="title_img">
                                    </label>
                                    <input type="file" id="book_img_2" class="peer" name="book_img_2" accept="image/jpeg, image/png, image/gif" onchange="changeInputImg(event)" hidden>
                                    <label for="book_img_3" class="mx-auto  md:w-full aspect-[1/1.125] cursor-pointer border border-solid border-gray_custom">
                                        <img class="object-fill w-full h-full" src="{{asset('images/books/no-image.jpg')}}" alt="title_img">
                                    </label>
                                    <input type="file" id="book_img_3" class="peer" name="book_img_3" accept="image/jpeg, image/png, image/gif" onchange="changeInputImg(event)" hidden>
                                    <label for="book_img_4" class="mx-auto md:w-full aspect-[1/1.125] cursor-pointer border border-solid border-gray_custom">
                                        <img class="object-fill w-full h-full" src="{{asset('images/books/no-image.jpg')}}" alt="title_img">
                                    </label>
                                    <input type="file" id="book_img_4" class="peer" name="book_img_4" accept="image/jpeg, image/png, image/gif" onchange="changeInputImg(event)" hidden>
                                </div>
                            </div>
                            <div class="flex flex-col flex-1 gap-y-4">
                                <div class="flex flex-col w-full md:flex-row gap-x-4">
                                    <div class="w-full">
                                        <label for="name" class="block">Name</label>
                                        <input type="text" id="name" required name="name" placeholder="Input book's name" value="Book's name" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                                        <p class="invisible peer-invalid:visible text-red_custom">Please enter book's name</p>
                                    </div>
                                    <div class="w-full">
                                        <label for="author" class="block">Author</label>
                                        <input type="text" id="author" name="author" required placeholder="Input book's name" value="Book's author" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                                        <p class="invisible peer-invalid:visible text-red_custom">Please enter book's author</p>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="des" class="block">Description</label>
                                    <textarea name="des" id="des" rows="4" placeholder="Input book's description" class="w-full px-2 py-2 border border-solid outline-none border-gray_custom focus:border-gray_custom_3">Book's description</textarea>
                                </div>
                                <div class="flex flex-col w-full md:flex-row gap-x-4">
                                    <div class="w-full">
                                        <label for="publisher" class="block">Publisher</label>
                                        <input type="text" id="publisher" name="publisher" required placeholder="Input book's publisher" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3" value="Book's publisher">
                                        <p class="invisible peer-invalid:visible text-red_custom">Please enter book's publisher</p>
                                    </div>
                                    <div class="w-full">
                                        <label for="supplier" class="block">Supplier</label>
                                        <input type="text" id="supplier" name="supplier" required placeholder="Input book's supplier" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3" value="Book's supplier">
                                        <p class="invisible peer-invalid:visible text-red_custom">Please enter book's supplier</p>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full md:flex-row gap-x-4">
                                    <div class="w-full">
                                        <label for="price" class="block">Price</label>
                                        <input type="number" id="price" min="0" name="price" required placeholder="Input book's price" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3" value="0">
                                        <p class="invisible peer-invalid:visible text-red_custom">Please enter book's price</p>
                                    </div>
                                    <div class="w-full">
                                        <label for="sale" class="block">Sale</label>
                                        <input type="number" id="sale" name="sale" min="0" required placeholder="Input book's name" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3" value="0">
                                        <p class="invisible peer-invalid:visible text-red_custom">Please enter book's sale</p>
                                    </div>
                                </div>
                                <div class="flex flex-col w-full md:flex-row gap-x-4">
                                    <div class="w-full">
                                        <label for="cover" class="block">Book's cover</label>
                                        <select class="w-full px-2 py-2 border border-solid border-gray_custom" name="cover" id="cover">
                                            <option selected value="paperback">Paperback</option>
                                            <option value="hardcover">Hardcover</option>
                                        </select>
                                    </div>
                                    <div class="w-full">
                                        <label for="type" class="block">Book's type</label>
                                        <select class="w-full px-2 py-2 border border-solid border-gray_custom" name="type" id="type">
                                            @foreach($types as $key => $type)
                                                <option value="{{$type['id']}}" {{$key == 0 ? "selected" : ''}}>{{$type['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="quantity" class="block">Quantity</label>
                                    <input type="number" id="quantity" min="1" name="quantity" required placeholder="Input book's quantity" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3" value="1">
                                    <p class="invisible peer-invalid:visible text-red_custom">Please enter book's quantity</p>
                                </div>
                                <div class="flex h-12 gap-2 sm:gap-4">
                                    <label for="open_modal_create_book" class="flex items-center justify-center flex-1 h-full rounded cursor-pointer hover:bg-gray_custom_4 bg-gray_custom">Close</label>
                                    <button type="submit" class="flex-1 h-full text-white rounded cursor-pointer bg-red_custom hover:bg-darkRed_custom">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex justify-start mt-2">
            <label for="open_modal_create_type" class="flex items-center justify-center w-full px-2 py-2 text-white rounded cursor-pointer sm:w-auto bg-blue_custom">Create a new type</label>
            <input type="checkbox" id="open_modal_create_type" hidden>
            <div id="modal_create_type" class="fixed !bg-[rgba(0,0,0,0.5)] top-0 left-0 right-0 h-screen flex justify-center items-center">
                <form action="{{route('admin_types_store')}}" method="post" class="w-11/12 max-h-screen p-4 overflow-y-scroll bg-white rounded md:overflow-visible md:w-7/12">
                    <div class="flex justify-end"><label for="open_modal_create_type"><i class="text-xl cursor-pointer fa-solid fa-xmark"></i></label></div>
                    <h2 class="mb-4 text-2xl font-bold text-center">Type</h2>
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div>
                            <label for="type" class="block mb-1 ml-2">Type</label>
                            <input type="text" id="type" name="name" placeholder="Input book's type" class="w-full px-2 py-2 border border-solid outline-none border-gray_custom focus:border-gray_custom_3">
                        </div>
                        <div class="flex flex-col flex-1 gap-y-4">
                            <div class="flex h-12 gap-2 sm:gap-4">
                                <label for="open_modal_create_type" class="flex items-center justify-center flex-1 h-full rounded cursor-pointer hover:bg-gray_custom_4 bg-gray_custom">Close</label>
                                <button type="submit" class="flex-1 h-full text-white rounded cursor-pointer bg-red_custom hover:bg-darkRed_custom">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="w-full mt-3 border-collapse table-auto">
        <thead>
            <tr class="text-left text-white bg-blue_custom">
                <th class="pl-3">Books</th>
                <th class="hidden sm:table-cell">Status</th>
                <th class="hidden md:table-cell">Publisher</th>
                <th>Price</th>
                <th class="hidden md:table-cell">Create at</th>
                <th class="pr-4 text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr class="bg-white tr">
                <td>
                    <div class="flex items-center gap-2 py-2 pl-3">
                        <img class="hidden object-cover w-12 md:block aspect-[1/1.125] rounded-sm" src="{{isset($book['image'][0]) ? asset('images/books/'.$book['image'][0]) : asset('images/books/no-image.jpg')}}" alt="avatar_customer">
                        <span class="font-bold">{{$book['name']}}</span>
                    </div>
                </td>
                <td class="hidden sm:table-cell">
                    <div class="flex items-center gap-2">
                        <span class="w-2 rounded-full aspect-square bg-green_custom"></span>
                        <span>On sale</span>
                    </div>
                </td>
                <td class="hidden capitalize md:table-cell">{{$book['publisher']}}</td>
                <td>
                    <div class="flex flex-col">
                        <span class="font-medium">{{convertToMoney(calculatorPrice((float)$book['price'],(float)$book['sale']))}}</span>
                        <span class="line-through">{{convertToMoney($book['price'])}}</span>
                    </div>
                </td>
                <td class="hidden md:table-cell">{{convertDateTime($book['created_at'])}}</td>
                <td class="py-3 pr-4">
                    <div class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                        <a href="{{route('admin_books_edit', $book['id'])}}" type="button" class="block w-20 text-center text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-blue_custom">Edit</a>
                        <button type="button" onclick="openModalDelete(`{{$book['name']}}`,'{{$book['id']}}','{{route('admin_books_destroy',$book['id'])}}')" class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-center mt-5">
        <x-pagination pagination={{$pagination}} count={{$count}}/>
    </div>
</main>
{{-- Modal Delete --}}
{{-- In Modal Delete has openModalDelete function --}}
<x-contain-modal-delete/>

{{-- Notification when has error --}}
@if(session('ms_error'))
    <x-toast type="error" msg="{{session('ms_error')}}"/>
@endif

{{-- Notification when success --}}
@if(session('msg'))
    <x-toast type="infor" msg="{{session('msg')}}"/>
@endif

@endsection

@pushOnce('scripts_low')
    <script src="{{asset('/js/custom.js')}}"></script>
@endPushOnce
