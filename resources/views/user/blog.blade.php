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
<x-page-title-background
    img="https://www.beepo.com.au/hs-fs/hubfs/Beepo%20Website/Images/2021/blogs/B_BlogT_Main_Learn%20successful%20offshore%20with%20Beepo%20and%20UQ%20business%20school.jpg?width=848&height=420&name=B_BlogT_Main_Learn%20successful%20offshore%20with%20Beepo%20and%20UQ%20business%20school.jpg"
    titleName="Blog" />
{{-- Content --}}
<div class="py-24 max-w-[1300px] w-full px-3 md:px-0 md:mx-auto grid grid-cols-1 md:grid-cols-[2fr,1fr] gap-x-6">
    <ul class="flex flex-col w-full gap-12">
        @foreach($blogs as $index => $blog)
        <li class="rounded-md shadow-xl">
            <div class="relative w-full">
                <img class="object-fill w-full max-h-[26.5rem]"
                    src="{{asset('images/blogs/'.$blog->image_title)}}" alt="img-blog">
                <span
                    class="absolute px-4 py-2 text-xl text-center text-white translate-x-1/2 rounded-md md:py-3 md:px-7 -translate-y-3/4 bg-red_custom font-playfair"><span
                        class="md:text-3xl">{{$blog->updated_at->format('d')}}</span><br /><span class="md:text-xl">{{$blog->updated_at->format('M')}}</span></span>
            </div>
            <div class="p-4 md:pt-[3.75rem] md:pb-9 md:px-9">
                <a href="{{route('blog_detail',['id'=>$blog->id])}}"
                    class="block mb-4 text-2xl font-semibold truncate cursor-pointer hover:text-red_custom font-playfair">{{$blog->title}}</a>
                <p class="text-base leading-6 font-roboto mb-7 text-gray_custom_3 truncate-3">{{$blog->abstract}}</p>
                <div class="flex">
                    <a class="flex items-center gap-1 cursor-pointer text-gray_custom_3 hover:text-red_custom"
                        href=""><i class="fa-solid fa-user"></i><span>{{$blog->nameType}}</span></a>
                    <div class="py-1 mx-3"><span class="w-[1px] bg-gray_custom block h-full"></span></div>
                    <div class="flex items-center gap-1 cursor-pointer text-gray_custom_3 hover:text-red_custom" href=""
                        class="text-sm"><i class="fa-solid fa-comments"></i><span>03 Comments</span></div>
                </div>
            </div>
        </li>
        @endforeach
        <div class="flex justify-center mt-5">
            <x-pagination pagination={{$pagination}} count={{$count}}/>
        </div>
    </ul>

    <div class="flex-col hidden gap-y-9 md:flex">
        <form action="{{route('blog')}}" class="p-[1.875rem] bg-gray_custom_4 flex">
            <input type="text" placeholder="Search Blog" name="search" class="flex-1 py-4 pl-5 pr-3 text-sm outline-none">
            <button type="submit" class="px-5 text-base font-medium text-white bg-red_custom">Search</button>
        </form>
        <div class="bg-gray_custom_4 p-[1.875rem]">
            <h3 class="pb-10 text-xl border-b border-solid font-playfair border-gray_custom">Category</h3>
            @foreach($blogCategoryTotal as $index => $type)
                <a class="block py-4 text-sm font-light border-b border-solid font-roboto border-gray_custom hover:text-red_custom"
                    href="{{route('blog_types',['id'=>$type->id])}}">{{$type->name.'('.($type->count==null ? 0 : $type->count).')'}}
                </a>
            @endforeach
        </div>
        <ul class="bg-gray_custom_4 p-[1.875rem]">
            <h3 class="pb-10 text-xl border-b border-solid font-playfair border-gray_custom">Recent Post</h3>
            @foreach($recentBlogs as $key => $recentBlog)
                <li class="grid grid-cols-[1fr,2fr] gap-x-5 py-4">
                    <div class="p-3"><img class="object-fill w-full aspect-square"
                            src="{{asset('images/blogs/'.$recentBlog->image_title)}}" alt="img-post">
                    </div>
                    <div class="flex flex-col justify-center">
                        <a href="{{route('blog_detail',['id'=>$recentBlog->id])}}" class="text-base font-semibold truncate hover:text-red_custom font-playfair">{{$recentBlog->title}}</a>
                        <p class="text-sm text-gray_custom_2">{{convertDateTime($recentBlog->created_at)}}</p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="bg-gray_custom_4 p-[1.875rem]">
            <h3 class="pb-10 text-xl border-b border-solid font-playfair border-gray_custom">Tag</h3>
            <div class="mt-4">
                @foreach($tagCategory as $key => $tag)
                <a href="{{route('blog_types',['id'=>$tag->id])}}"
                class="capitalize font-roboto text-sm py-1 px-5 bg-white text-gray_custom_2 hover:text-white hover:bg-red_custom inline-block m-[0.3125rem]">{{$tag->name}}</a>
                @endforeach

            </div>
        </div>
    </div>
</div>
{{-- Footer --}}
@endsection
