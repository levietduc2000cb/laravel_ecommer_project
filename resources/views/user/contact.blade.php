@extends('user/layout.app')

@section('title')
Contact
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
<x-page-title-background img="https://booksupnorth.com/wp-content/uploads/2018/01/contact-1-scaled.jpg"
    titleName="Contact" />
{{-- Content --}}
<div class="max-w-[1300px] w-full mx-auto py-24 px-4">
    {{-- Map --}}
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.317668290469!2d105.81637577517508!3d20.979899580657268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acf1be4d3167%3A0x7324b134c15afef8!2zMjA0IMSQLiBLaW0gR2lhbmcsIMSQ4bqhaSBLaW0sIEhvw6BuZyBNYWksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1691417519875!5m2!1svi!2s"
        width="100%" height="470" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    {{-- Get in Touch --}}
    <div class="mt-16">
        <h2 class="text-[1.75rem] font-semibold font-playfair mb-5">Get in Touch</h2>
        <div class="flex flex-col-reverse w-full md:flex-row">
            <form action="{{route('send-email-contact')}}" method="POST" class="w-full mt-6 md:mt-0 md:w-3/4 md:pr-24">
                @csrf
                <textarea class="w-full py-4 pl-[1.125rem] pr-3 text-sm border border-solid rounded border-gray_custom"
                    name="message" id="" cols="30" rows="10" placeholder="Enter Message"></textarea>
                <div class="flex w-full mt-8 gap-7">
                    <input type="text" placeholder="Enter your name" name="name"
                        class="border border-solid border-gray_custom w-full py-4 pl-[1.125rem] pr-3 text-sm rounded">
                    <input type="emai" placeholder="Email" name="email"
                        class="border border-solid border-gray_custom w-full py-4 pl-[1.125rem] pr-3 text-sm rounded">
                </div>
                <input type="text" placeholder="Enter Subject" name="subject"
                    class="mt-8 border border-solid border-gray_custom w-full py-4 pl-[1.125rem] pr-3 text-sm rounded">
                <button type="submit"
                    class="py-[1.125rem] border border-solid mt-11 px-11 border-red_custom text-red_custom hover:text-white hover:bg-red_custom cursor-pointer">Send</button>
            </form>
            <ul class="flex flex-col w-full md:w-1/4 gap-11">
                <li class="flex items-center gap-6">
                    <i class="text-2xl fa-solid fa-house"></i>
                    <div class="text-base leading-6">
                        <span class="block font-medium font-playfair">204 Kim Giang, Ha Noi City</span>
                        <span class="block font-light font-roboto text-gray_custom_2">Rosemead, CA 91770</span>
                    </div>
                </li>
                <li class="flex items-center gap-6">
                    <i class="text-2xl fa-solid fa-phone"></i>
                    <div class="text-base leading-6">
                        <span class="block font-medium font-playfair">+84 098765421</span>
                        <span class="block font-light font-roboto text-gray_custom_2">Mon to Fri 9am to 6pm</span>
                    </div>
                </li>
                <li class="flex items-center gap-6">
                    <i class="text-2xl fa-solid fa-envelope"></i>
                    <div class="text-base leading-6">
                        <span class="block font-medium font-playfair">Support@gmail.com</span>
                        <span class="block font-light font-roboto text-gray_custom_2">Send us your query anytime!</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@if(session('msg'))
<x-toast type="infor" msg="{{session('msg')}}" />
@endif

@endsection
