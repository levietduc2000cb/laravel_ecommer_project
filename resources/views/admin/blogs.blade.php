@extends('admin/layout.app')

@section('title')
Blogs
@endsection

@section('sidebar')
@include('admin/layout/sidebar')
@endsection

@section('header')
{{-- Header --}}
<x-admin-header title="Blogs"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
@include('admin/layout/footer')
@endsection

@section('content')
<style>
    input[id="open_modal_create_type"]+#modal_create_type {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-300px);
        transition: all 0.5s ease-in-out;
    }

    input[id="open_modal_create_type"]:checked+#modal_create_type {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
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
    <x-admin-search-bar route-name="admin_blogs" search={{$search}} placeholder="Find blog" route-search="/blogs/search-name"></x-admin-search-bar>
    <div class="flex flex-col sm:flex-row gap-x-3">
        <div class="flex justify-start mt-2">
            <a href="{{route('admin_blog_create_page')}}" class="flex items-center justify-center w-full px-2 py-2 text-center text-white rounded cursor-pointer sm:w-auto bg-darkRed_custom">Create a new blog</a>
        </div>
        <div class="flex justify-start mt-2">
            <label for="open_modal_create_type" class="flex items-center justify-center w-full px-2 py-2 text-white rounded cursor-pointer sm:w-auto bg-blue_custom">Create a new type</label>
            <input type="checkbox" id="open_modal_create_type" hidden>
            <div id="modal_create_type" class="fixed !bg-[rgba(0,0,0,0.5)] top-0 left-0 right-0 h-screen flex justify-center items-center">
                <form action="{{route('admin_types_blog_store')}}" method="post" class="w-11/12 max-h-screen p-4 overflow-y-scroll bg-white rounded md:overflow-visible md:w-7/12">
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
                <th class="pl-3">Id</th>
                <th>Blog</th>
                <th class="hidden sm:table-cell">Written by</th>
                <th class="hidden md:table-cell">Create at</th>
                <th class="pr-4 text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $key => $blog)
                <tr class="bg-white tr">
                    <td>
                        <div class="flex items-center gap-2 py-2 pl-3">
                            <img class="hidden object-cover w-12 md:block aspect-[1/1.125] rounded-sm" src="{{(isset($blog->image_title) ? asset('images/blogs/'.$blog->image_title) : asset('images/books/no-image.jpg'))}}" alt="avatar_customer">
                            <span class="font-bold">#{{$blog->id}}</span>
                        </div>
                    </td>
                    <td class="hidden sm:table-cell">
                        <div class="flex items-center gap-2">
                            <span class="truncate">{{$blog->title}}</span>
                        </div>
                    </td>
                    <td class="hidden capitalize md:table-cell">{{$blog->written_by}}</td>
                    <td class="hidden md:table-cell">{{convertDateTime($blog->updated_at)}}</td>
                    <td class="py-3 pr-4">
                        <div class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                            <a href="{{route('admin_blog_edit_page',['id'=>$blog->id])}}" class="block w-20 text-center text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-blue_custom">Edit</a>
                            <button type="button" onclick="openModalDelete(`{{$blog->title}}`,'{{$blog->id}}','{{route('admin_blog_destroy',$blog->id)}}')" class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="flex justify-center mt-5">
        <x-pagination pagination={{$pagination}} name-route="admin_books" count={{$count}} search={{$search}}/>
    </div> --}}
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
