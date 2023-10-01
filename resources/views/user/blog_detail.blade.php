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
    <main class="py-10 max-w-[1300px] w-full px-3 md:px-0 md:mx-auto">
        <div class="text-3xl font-extrabold text-center uppercase opacity-80">{{$blog->title}}</div>
        <div class="text-2xl font-bold text-center opacity-80">{{$blog->written_by}}</div>
        <div class="mt-3 text-lg leading-8">
            <?php echo $blog->content ?>
        </div>
    </main>
@endsection
