@extends('user/layout.app')

@section('title')
Category
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

$genresOptions = [
["id"=>"history","name"=>"History"],
["id"=>"horror_thriller","name"=>"Horror - Thriller"],
["id"=>"love_stories","name"=>"Love Stories"],
["id"=>"science_fiction","name"=>"Science Fiction"],
["id"=>"biography","name"=>"Biography"]
];

$starOptions = [
["name"=>"5-star","value"=>"5","content"=>"5 Star Rating"],
["name"=>"4-star","value"=>"4","content"=>"4 Star Rating"],
["name"=>"3-star","value"=>"3","content"=>"3 Star Rating"],
["name"=>"2-star","value"=>"2","content"=>"2 Star Rating"],
["name"=>"1-star","value"=>"1","content"=>"1 Star Rating"]
];
$priceOptions=[
["name"=>"high","value"=>"high","content"=>"From high to low"],
["name"=>"low","value"=>"low","content"=>"From low to high"]
];

$publisherOptions = [
["id"=>"green_publications","name"=>"Green Publications"],
["id"=>"anondo_publications","name"=>"Anondo Publications"],
["id"=>"rinku_publications","name"=>"Rinku Publications"],
["id"=>"sheba_publications","name"=>"Sheba Publications"],
["id"=>"red_publications","name"=>"Red Publications"]
];

$authorOptions = [
["id"=>"buster_hyman","name"=>"Buster Hyman"],
["id"=>"phil_harmonic","name"=>"Phil Harmonic"],
["id"=>"cam_l_toe","name"=>"Cam L.Toe"],
["id"=>"otto_matic","name"=>"Science Fiction"],
["id"=>"juan_annatoo","name"=>"Biography"]
];

$popularityOptions = [
["name"=>"name","value"=>"name","content"=>"Name"],
["name"=>"new","value"=>"new","content"=>"New"],
["name"=>"old","value"=>"old","content"=>"Old"]
];
$genresList = isset($genresList) ? explode(",", $genresList) : [];
$publishersList = isset($publishersList) ? explode(",", $publishersList) : [];
$authorsList = isset($authorsList) ? explode(",", $authorsList) : [];
@endphp
{{-- Title --}}
<x-page-title-background img="https://preview.colorlib.com/theme/abcbook/assets/img/hero/h2_hero1.jpg.webp"
    titleName="Category" />
{{-- List item --}}
<div class="px-3 mt-12">
    <div
        class="max-w-[1300px] w-full grid grid-cols-1 sm:grid-cols-[1fr,2fr] md:grid-cols-[0.8fr,2fr] lg:grid-cols-[0.6fr,2fr] gap-x-6 mx-auto">
        <div class="hidden px-5 py-8 border border-solid border-gray_custom sm:block">
            <p class="text-lg font-semibold font-playfair mb-7">Filter by Genres</p>
            <ul class="flex flex-col gap-y-3 font-roboto">
                @foreach($types as $key=>$genresOption)
                <x-option-rounded-checkbox :checkedOption="$genresList" :name="$genresOption['name']" :id="$genresOption['id']" :labelKeyName="'genre-'.$key" classCustom="genre"/>
                @endforeach
            </ul>
            <p class="text-lg font-semibold font-playfair my-7">Filter by Price</p>
            <ul>
                <li class="relative w-full py-3 border border-solid rounded-full border-gray_custom font-roboto">
                    <x-select-custom mainId="price" mainTitle="Filter by Price" :options="$priceOptions" />
                </li>
                <li class="relative w-full py-3 border border-solid rounded-full mt-7 border-gray_custom font-roboto">
                    <x-select-custom mainId="star" mainTitle="Filter by Rating" :options="$starOptions" />
                </li>
            </ul>
            <p class="text-lg font-semibold font-playfair my-7">Filter by Publisher</p>
            <ul class="flex flex-col gap-y-3 font-roboto">
                @foreach($publishers as $key=>$publisherOption)
                <x-option-rounded-checkbox :checkedOption="$publishersList" :name="$publisherOption['publisher']" :id="$publisherOption['publisher']" :labelKeyName="'publisher-'.$key" classCustom="publisher"/>
                @endforeach
            </ul>
            <p class="text-lg font-semibold font-playfair my-7">Filter by Author Name</p>
            <ul class="flex flex-col gap-y-3 font-roboto">
                @foreach($authors as $key=>$authorOption)
                <x-option-rounded-checkbox :checkedOption="$authorsList" :name="$authorOption['author']" :id="$authorOption['author']" :labelKeyName="'author-'.$key" classCustom="author"/>
                @endforeach
            </ul>
        </div>
        <div>
            <div class="flex justify-end">
                <div
                    class="relative w-2/3 py-3 border border-solid rounded-full md:w-2/5 lg:w-4/12 border-gray_custom font-roboto">
                    <x-select-custom mainId="popularity" mainTitle="Browse by popularity"
                        :options="$popularityOptions" />
                </div>
            </div>
            @if(isset($books) && count($books)>0)
                <div class="grid w-full grid-cols-2 gap-2 sm:gap-4 md:gap-6 lg:grid-cols-4 md:grid-cols-3 mt-7">
                    @foreach($books as $bookItem)
                    <x-book-item :id="$bookItem['id']" :img="asset('images/books/'.$bookItem['image'][0]) ? asset('images/books/'.$bookItem['image'][0]) : asset('images/books/no-image.jpg')" :name="$bookItem['name']" :author="$bookItem['author']"
                        :stars="$bookItem['star']" :reviewers="100" :price="$bookItem['price']" />
                    @endforeach
                </div>
            @else
                <div class="mt-10 text-center">There are no books that satisfy the filter criteria</div>
            @endif
            {{-- Pagination custome 2 --}}
            @if(isset($books) && count($books)>0)
                <div class="flex justify-center mt-5">
                    <x-pagination pagination={{$pagination}} count={{$count}}/>
                </div>
            @endif
        </div>
    </div>
</div>
{{-- Advertise 2 --}}
<div class="relative mt-8 advertise_2">
    <div class="max-w-[1300px] px-3 md:px-0 w-full mx-auto flex flex-col items-center py-[4.6875rem]"
        style="background-image: url('https://preview.colorlib.com/theme/abcbook/assets/img/gallery/section-bg1.jpg.webp')">
        <h2 class="mb-6 text-[2.5rem] font-medium font-playfair text-white">Join Us</h2>
        <p class="mb-5 text-base font-normal text-center text-gray_custom_2">Discover a world of knowledge and a love
            for books at our store<br />where you can find thousands of books across a wide range of subjects, from
            literature to science, business and art<br />to meet all your reading needs.</p>
        <form action="/" method="POST" class="flex flex-col items-center gap-3 md:flex-row">
            <input type="email"
                class="px-6 py-4 text-base font-medium border border-solid rounded-full outline-none border-gray_custom"
                type="text" placeholder="Enter your email">
            <button class="px-6 py-4 font-semibold text-white rounded-full bg-red_custom">Send</button>
        </form>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-1/2 bg-lightPink_custom z-[-1]"></div>
</div>
{{-- Footer --}}
@endsection
