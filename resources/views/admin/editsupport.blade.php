@extends('admin/layout.app')

@section('title')
    Edit Support
@endsection

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection

@section('header')
    {{-- Header --}}
    <x-admin-header title="Edit Support"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')
    {{-- Content --}}
    <main>
        <h3 class="text-2xl font-semibold">{{$faq[0]->title}}({{convertDateTime($faq[0]->created_at)}})</h3>
        <div>
            <h3 class="text-xl font-medium">Question</h3>
            <p class="text-lg font-normal">{{$faq[0]->question}}</p>
        </div>
        <form action="{{route('admin_faqs_update',['id'=>$faq[0]->id])}}" method="POST">
            @csrf
            @method('put')
            <label class="text-xl font-medium" for="answer">Answer</label>
            <textarea required name="answer" id="answer" rows="10" class="w-full p-3 mt-2 text-lg font-normal border border-solid border-gray_custom_2">{{isset($faq[0]->answer)?trim($faq[0]->answer):null}}</textarea>
            <div class="flex w-full mt-4 gap-x-3">
                <a href="{{route('admin_faqs')}}" class="flex-1 py-2 text-center bg-gray_custom hover:opacity-95">Back</a>
                <button type="submit" class="flex-1 py-2 text-white bg-blue_custom hover:opacity-95">Answer</button>
            </div>
        </form>
    </main>
     {{-- Footer --}}
@endsection
{{-- Notification when has error --}}
@if(session('ms_error'))
    <x-toast type="error" msg="{{session('ms_error')}}"/>
@endif

{{-- Notification when success --}}
@if(session('msg'))
    <x-toast type="infor" msg="{{session('msg')}}"/>
@endif





