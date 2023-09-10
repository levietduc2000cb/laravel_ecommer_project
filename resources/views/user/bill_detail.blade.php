@extends('user/layout.app')

@section('title')
Bill
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
<x-page-title-background img="https://i1.sndcdn.com/visuals-000002429423-2fdYq5-t1240x260.jpg" titleName="Bill" />
{{-- Content --}}
<div class="max-w-[1300px] py-20 w-full px-3 md:px-0 md:mx-auto">
    <div></div>
</div>
{{-- Footer --}}
@endsection