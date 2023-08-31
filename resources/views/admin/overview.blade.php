@extends('admin/layout.app')

@section('title')
    Admin
@endsection

@section('sidebar')
    @include('admin/layout/sidebar')
@endsection

@section('header')
    {{-- Header --}}
    <x-admin-header title="Overview"></x-admin-header>
@endsection

@section('footer')
{{-- Footer --}}
    @include('admin/layout/footer')
@endsection

@section('content')
    {{-- Title --}}
    {{-- Content --}}
    <main class="border-t border-solid border-gray_custom_3">
        <div class="py-3">
            <h2 class="mb-3 text-xl font-bold">Introduction</h2>
            <p class="px-2">Welcome to the world of XYZ Tech Solutions! We are excited to present our latest innovative product that is set to revolutionize the way you work and streamline your daily operations. With our cutting-edge technology and commitment to excellence, we aim to empower businesses and individuals with efficient solutions tailored to meet their unique needs.<br/>
                At XYZ Tech Solutions, we understand the challenges faced by modern enterprises in today's fast-paced digital landscape. Our team of skilled engineers and designers have collaborated tirelessly to develop a product that combines functionality, usability, and scalability. We proudly introduce our groundbreaking solution that will propel your business towards unmatched productivity and success.</p>
        </div>
        <div class="py-3">
            <h2 class="mb-3 text-xl font-bold">Introduction</h2>
            <p class="px-2">Welcome to the world of XYZ Tech Solutions! We are excited to present our latest innovative product that is set to revolutionize the way you work and streamline your daily operations. With our cutting-edge technology and commitment to excellence, we aim to empower businesses and individuals with efficient solutions tailored to meet their unique needs.<br/>
                At XYZ Tech Solutions, we understand the challenges faced by modern enterprises in today's fast-paced digital landscape. Our team of skilled engineers and designers have collaborated tirelessly to develop a product that combines functionality, usability, and scalability. We proudly introduce our groundbreaking solution that will propel your business towards unmatched productivity and success.</p>
        </div>
        <div class="py-3">
            <h2 class="mb-3 text-xl font-bold">Introduction</h2>
            <p class="px-2">Welcome to the world of XYZ Tech Solutions! We are excited to present our latest innovative product that is set to revolutionize the way you work and streamline your daily operations. With our cutting-edge technology and commitment to excellence, we aim to empower businesses and individuals with efficient solutions tailored to meet their unique needs.<br/>
                At XYZ Tech Solutions, we understand the challenges faced by modern enterprises in today's fast-paced digital landscape. Our team of skilled engineers and designers have collaborated tirelessly to develop a product that combines functionality, usability, and scalability. We proudly introduce our groundbreaking solution that will propel your business towards unmatched productivity and success.</p>
        </div>
        <div class="py-3">
            <h2 class="mb-3 text-xl font-bold">Introduction</h2>
            <div class="flex flex-col items-center gap-4 md:flex-row">
                <img class="object-fill h-full" src="https://th.bing.com/th/id/OIP.DrbRe5vO9jXWcLxOFq618wHaEK?w=248&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="img_title">
                <p class="flex-1 px-2">Welcome to the world of XYZ Tech Solutions! We are excited to present our latest innovative product that is set to revolutionize the way you work and streamline your daily operations. With our cutting-edge technology and commitment to excellence, we aim to empower businesses and individuals with efficient solutions tailored to meet their unique needs.<br/>
                At XYZ Tech Solutions, we understand the challenges faced by modern enterprises in today's fast-paced digital landscape. Our team of skilled engineers and designers have collaborated tirelessly to develop a product that combines functionality, usability, and scalability. We proudly introduce our groundbreaking solution that will propel your business towards unmatched productivity and success.</p>
            </div>
        </div>
        <div class="py-3">
            <h2 class="mb-3 text-xl font-bold">Introduction</h2>
            <div class="flex flex-col items-center gap-4 md:flex-row-reverse">
                <img class="object-fill h-full" src="https://th.bing.com/th/id/OIP.DrbRe5vO9jXWcLxOFq618wHaEK?w=248&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="img_title">
                <p class="flex-1 px-2">Welcome to the world of XYZ Tech Solutions! We are excited to present our latest innovative product that is set to revolutionize the way you work and streamline your daily operations. With our cutting-edge technology and commitment to excellence, we aim to empower businesses and individuals with efficient solutions tailored to meet their unique needs.<br/>
                At XYZ Tech Solutions, we understand the challenges faced by modern enterprises in today's fast-paced digital landscape. Our team of skilled engineers and designers have collaborated tirelessly to develop a product that combines functionality, usability, and scalability. We proudly introduce our groundbreaking solution that will propel your business towards unmatched productivity and success.</p>
            </div>
        </div>
    </main>
     {{-- Footer --}}
@endsection
