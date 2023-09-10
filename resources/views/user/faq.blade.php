@extends('user/layout.app')

@section('title')
FAQ
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
{{-- Content --}}
<div class="max-w-[1300px] py-5 w-full px-3 md:px-0 mx-auto font-playfair">
    <h2 class="text-2xl font-extrabold">We're here to help you with anything and everything on CatBook</h2>
    <p class="my-4 text-base text-gray_custom_3">At CatBook we bring good and useful books, and answer the questions of
        readers and buyers when shopping on our official website. We hope you will enjoy these precious books and
        appreciate them</p>
    <div class="flex my-4 overflow-hidden border border-solid rounded-full border-gray_custom_3">
        <a id="search_faq" href="" type="submit" name="search" class="w-auto h-auto border-none outline-none"><i
                class="p-3 fa-solid fa-magnifying-glass"></i></a>
        <input oninput="changeSearchFaqs(event)" type="text" placeholder="Search help"
            value="{{isset($search)?$search:''}}" class="flex-1 px-3 outline-none">
    </div>
    <h2 class="my-4 text-lg font-bold">FAQ</h2>
    <ul>
        @foreach($faqs as $key => $faq)
        <li class="px-2 py-4 border-t border-b border-solid border-gray_custom">
            <input type="checkbox" id="faq_{{$key}}" hidden>
            <label for="faq_{{$key}}" class="flex items-center justify-between cursor-pointer">
                <span class="font-bold">{{$faq['title']}}</span>
                <i class="fa-solid fa-plus"></i>
            </label>
            <div class="mt-1 faq !bg-white">
                {{isset($faq['answer']) ? $faq['answer'] : "Not answer"}}
            </div>
        </li>
        @endforeach
    </ul>
    <div class="mt-3 text-right">
        <label for="btn_open-faq"
            class="flex items-center justify-center px-5 py-3 font-semibold text-white rounded cursor-pointer bg-red_custom">Send
            a message</label>
        <input type="checkbox" id="btn_open-faq">
        <form action="{{route('user_faq_store')}}" method="POST" class="faq fixed inset-0 modal bg-[rgba(1,1,1,0.3)]">
            @csrf
            <div class="flex items-center justify-center w-full h-full">
                <div class="w-[95%] p-2 bg-white md:p-12 md:w-10/12 rounded-lg">
                    <h3 class="text-3xl font-bold text-center font-playfair">Question</h3>
                    <label for="title" class="block mt-3 text-lg font-bold text-left">Title</label>
                    <input type="text" required id="title" name="title"
                        class="block w-full p-3 mt-2 border border-solid border-gray_custom">
                    <label for="question" class="block mt-3 text-lg font-bold text-left">Question</label>
                    <textarea rows="10" name="question" required id="question"
                        class="block w-full p-3 mt-2 border border-solid border-gray_custom"></textarea>
                    <div class="flex gap-2 mt-6 md:gap-5">
                        <label for="btn_open-faq"
                            class="flex items-center justify-center flex-1 py-4 font-bold rounded-md cursor-pointer bg-gray_custom">Close</label>
                        <button type="submit"
                            class="flex-1 py-4 font-bold text-white rounded-md bg-blue_custom">Send</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Notification when has error --}}
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
    let routeSearch = "<?php echo route('user_faqs'); ?>"
    function changeSearchFaqs(e){
        let searchFaq = document.getElementById('search_faq');
        let searchValue = e.target.value.trim();
        if(!searchValue){
            searchFaq.href = routeSearch;
        }
        else{
            searchFaq.href = routeSearch+"?search="+searchValue;
        }
    }
</script>
@endPushOnce