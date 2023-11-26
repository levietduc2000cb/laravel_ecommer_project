@extends('admin/layout.app')

@section('title')
Support
@endsection

@section('sidebar')
@include('admin/layout/sidebar')
@endsection

@section('header')
{{-- Header --}}
<x-admin-header title="Support"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
@include('admin/layout/footer')
@endsection

@section('content')
<style>
    tbody>tr:nth-child(odd) {
        background-color: white;
    }

    tbody>tr:nth-child(even) {
        background-color: #f6f6f6;
    }
</style>
{{-- Content --}}
@php
if(isset($faqs)){
if (isset($pagination) && (int)$pagination>1){
$pagination = $pagination;
}else{
$pagination = null;
}
if(!isset($search)){
$search = null;
}}
if($count == 0){
$count = 1;
}
@endphp
<main>
    <x-admin-search-bar route-name="admin_faqs" search={{$search}} placeholder="Find question"
        route-search="/faqs/search-name"></x-admin-search-bar>
    <table class="w-full mt-3 border-collapse table-auto">
        <thead>
            <tr class="text-left text-white bg-blue_custom">
                <th class="pl-3">Customers</th>
                <th class="hidden sm:table-cell">Status</th>
                <th class="px-2">Question</th>
                <th class="hidden md:table-cell">Create at</th>
                <th class="pr-4 text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($faqs) && count($faqs)>0)
            @foreach($faqs as $faq)
            <tr class="cursor-pointer">
                <td>
                    <div class="flex items-center gap-2 py-2 pl-3">
                        <img class="hidden object-cover w-12 rounded-full md:block aspect-square"
                            src="{{isset($faq->avatarUrl) ? asset('images/users/'.$faq->avatarUrl) : asset('images/books/no-image.jpg')}}"
                            alt="avatar_customer">
                        <span class="font-bold">{{$faq->fullName}}</span>
                    </div>
                </td>
                <td class="hidden sm:table-cell">
                    <div class="flex items-center gap-2">
                        <span class="w-2 rounded-full aspect-square {{isset($faq['answer'])?"
                            bg-green_custom":"bg-darkRed_custom"}}"></span>
                        <span>{{isset($faq['answer'])?"Answer":"Not Answer"}}</span>
                    </div>
                </td>
                <td class="px-2 capitalize">{{$faq['title']}}</td>
                <td class="hidden md:table-cell">{{convertDateTime($faq['created_at'])}}</td>
                <td class="py-3 pr-4">
                    <div
                        class="flex flex-col items-end gap-2 justify-evenly sm:items-center sm:justify-end sm:flex-row">
                        <a href="{{route('admin_faqs_edit',['id'=>$faq['id']])}}"
                            class="block w-20 text-center text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-blue_custom">Answer</a>
                        <button type="button"
                            onclick="openModalDelete(`{{$faq['title']}}`,'{{$faq['id']}}','{{route('admin_faqs_destroy',$faq['id'])}}')"
                            class="w-20 text-white rounded sm:w-auto sm:px-2 sm:py-1 bg-red_custom">Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="pt-2 text-center">Không có câu hỏi nào</td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="flex justify-center mt-5">
        <x-pagination pagination={{$pagination}}  count={{$count}} />
    </div>
</main>
{{-- Footer --}}
<x-contain-modal-delete />
{{-- Notification when has error --}}
@if(session('ms_error'))
<x-toast type="error" msg="{{session('ms_error')}}" />
@endif

{{-- Notification when success --}}
@if(session('msg'))
<x-toast type="infor" msg="{{session('msg')}}" />
@endif
@endsection
