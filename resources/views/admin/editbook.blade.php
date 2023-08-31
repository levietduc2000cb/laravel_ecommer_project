@extends('admin/layout.app')

@section('title')
    Edit {{$book[0]->name}}
@endsection

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection

@section('header')
    {{-- Header --}}
    <x-admin-header title="Edit Book"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')
    {{-- Title --}}
    {{-- Content --}}
    <style>
        .book_img:hover > i{
            display: block;
        }
    </style>
    <main>
        <form method="post" enctype="multipart/form-data">
            <div class="flex w-full">
                @method('put')
                @csrf
                <div class="flex flex-col w-full gap-4 md:flex-row">
                    <div class="flex items-center w-full h-full md:w-2/5">
                        <div class="grid w-full h-full grid-cols-2 gap-2 md:h-3/4">
                            @for($i = 0; $i < 4; $i++)
                                @if(isset($book[0]->image[$i]))
                                    <div class="relative overflow-hidden border border-solid book_img border-gray_custom">
                                        <label for="{{'book_img_edit_'.$i+1}}" class="mx-auto w-full aspect-[1/1.125] cursor-pointer">
                                            <img class="object-fill w-full h-full" src="{{asset('images/books/'.$book[0]->image[$i])}}" alt="title_img">
                                        </label>
                                        <input type="file" id="{{'book_img_edit_'.$i+1}}" name="{{'book_img_edit_'.$i+1}}" onchange="changeInputImg(event)" hidden>
                                        <i onclick="deleteImage(event, `{{asset('images/books/no-image.jpg')}}`,{{$i}})" class="absolute top-0 right-0 block text-lg -translate-y-[15%] delete-image-button md:hidden text-red_custom fa-solid fa-circle-xmark"></i>
                                    </div>
                                @else
                                    <label for="{{'book_img_edit_'.$i+1}}" class="mx-auto w-full aspect-[1/1.125] cursor-pointer border border-solid border-gray_custom">
                                        <img class="object-fill w-full h-full" src="{{asset('images/books/no-image.jpg')}}" alt="title_img">
                                    </label>
                                    <input type="file" id="{{'book_img_edit_'.$i+1}}" name="{{'book_img_edit_'.$i+1}}" onchange="changeInputImg(event)" hidden>
                                @endif
                            @endfor
                        </div>
                        <input type="text" hidden id="image_empty" name="image_empty">
                    </div>
                    <div class="flex flex-col flex-1 gap-y-4">
                        <h2 class="mb-4 text-2xl font-bold text-center">{{$book[0]->name}}</h2>
                        <div class="flex flex-col w-full md:flex-row gap-x-4">
                            <div class="w-full">
                                <label for="name" class="block">Name</label>
                                <input type="text" id="name" name="name" placeholder="Input book's name" required value="{{$book[0]->name}}" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                                <p class="invisible peer-invalid:visible text-red_custom">Please enter book's name</p>
                            </div>
                            <div class="w-full">
                                <label for="author" class="block">Author</label>
                                <input type="text" id="author" name="author" placeholder="Input book's name" value="{{$book[0]->author}}" required class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                                <p class="invisible peer-invalid:visible text-red_custom">Please enter book's author</p>
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="des" class="block">Description</label>
                            <textarea name="des" id="des" rows="4" placeholder="Input book's description" class="w-full px-2 py-2 border border-solid outline-none border-gray_custom focus:border-gray_custom_3">{{$book[0]->des}}</textarea>
                        </div>
                        <div class="flex flex-col w-full md:flex-row gap-x-4">
                            <div class="w-full">
                                <label for="publisher" class="block">Publisher</label>
                                <input type="text" id="publisher" name="publisher" placeholder="Input book's publisher" required value="{{$book[0]->publisher}}" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                                <p class="invisible peer-invalid:visible text-red_custom">Please enter book's publisher</p>
                            </div>
                            <div class="w-full">
                                <label for="supplier" class="block">Supplier</label>
                                <input type="text" id="supplier" name="supplier" placeholder="Input book's supplier" required value="{{$book[0]->supplier}}" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3">
                                <p class="invisible peer-invalid:visible text-red_custom">Please enter book's supplier</p>
                            </div>
                        </div>
                        <div class="flex flex-col w-full md:flex-row gap-x-4">
                            <div class="w-full">
                                <label for="price" class="block">Price</label>
                                <input type="number" id="price" min="0" name="price" placeholder="Input book's price" required value="{{$book[0]->price}}" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3" value="0">
                                <p class="invisible peer-invalid:visible text-red_custom">Please enter book's price</p>
                            </div>
                            <div class="w-full">
                                <label for="sale" class="block">Sale</label>
                                <input type="number" id="sale" name="sale" min="0" placeholder="Input book's name" required value="{{$book[0]->sale}}" class="w-full px-2 py-2 border border-solid outline-none peer border-gray_custom focus:border-gray_custom_3" value="0">
                                <p class="invisible peer-invalid:visible text-red_custom">Please enter book's sale</p>
                            </div>
                        </div>
                        <div class="flex flex-col w-full md:flex-row gap-x-4">
                            <div class="w-full">
                                <label for="cover" class="block">Book's cover</label>
                                <select class="w-full px-2 py-2 border border-solid border-gray_custom" name="cover" id="cover">
                                    <option value="paperback" {{$book[0]->cover == 'paperback' ? 'selected' : ''}}>Paperback</option>
                                    <option value="hardcover" {{$book[0]->cover == 'hardcover' ? 'selected' : ''}}>Hardcover</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="type" class="block">Book's type</label>
                                <select class="w-full px-2 py-2 border border-solid border-gray_custom" name="type" id="type">
                                    @foreach($types as $key => $type)
                                        <option value="{{$type['id']}}" {{$book[0]->type == $type['id'] ? 'selected' : ''}} >{{$type['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex h-12 gap-2 sm:gap-4">
                            <a href="{{route('admin_books')}}" class="flex items-center justify-center flex-1 h-full rounded cursor-pointer hover:bg-gray_custom_2 bg-gray_custom">Close</a>
                            <button type="submit" class="flex-1 h-full text-white rounded cursor-pointer bg-blue_custom hover:opacity-90">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
     {{-- Footer --}}
@endsection

@pushOnce('scripts_low')
    <script src="{{asset('/js/custom.js')}}"></script>
    <script>
        let imageEmpty = document.getElementById('image_empty');
        let listImageEmpty = [];
        function deleteImage(e,pathNoneImage,index) {
            e.preventDefault();
            e.stopPropagation();
            let parentNode = e.target.parentNode;
            let img = parentNode.querySelector('img');
            let input = parentNode.querySelector('input');
            img.src = pathNoneImage;
            //Check index image want to delete
            if(listImageEmpty.includes(index)){
                return;
            }
            listImageEmpty.push(index);
            imageEmpty.value = JSON.stringify(listImageEmpty);
        }
    </script>
@endPushOnce




