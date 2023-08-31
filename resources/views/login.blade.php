<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
@php
    $phone = old('phone') ? old('phone') : '1234567890';
    $password = old('password') ? old('password') : '123456';
@endphp
<div class="flex items-center justify-center min-h-screen">
    <form action="{{route('handle-login')}}" method="POST" class="max-w-[700px] w-full shadow-2xl p-5 md:p-12 m-2 md:m-4 lg:m-0">
        <h1 class="mb-4 text-3xl font-bold text-center text-blue_custom">Login</h1>
        <p class="mb-4 text-base font-light text-center">Enter Login detail to get access</p>
        <div class="pt-[2.2rem] pb-5 md:pb-[4.7rem]">
            @csrf
            <div class="flex flex-col mb-5">
                <label class="mb-[0.4rem] capitalize  text-lg font-medium text-blue_custom" for="phone">Phone number</label>
                <input type="tel" required value={{$phone}} class="peer text-base px-6 py-4 border-[1px] border-solid border-gray_custom" placeholder="Phone number" name="phone" id="phone">
                <p class="invisible peer-invalid:visible text-red_custom">Please enter your phone number</p>
            </div>
            <div class="flex flex-col mb-5">
                <label class="mb-[0.4rem] capitalize text-lg font-medium text-blue_custom" for="password">Password</label>
                <input type="password" required value={{$password}} class="peer text-base px-6 py-4 border-[1px] border-solid border-gray_custom" placeholder="Enter Password" name="password" id="password">
                <p class="invisible peer-invalid:visible text-red_custom">Please enter your password</p>
            </div>
            <div class="items-center justify-between md:flex">
                <div class="flex gap-[10px] items-center">
                    <input type="checkbox" name="keep_login" id="keep_login" hidden>
                    <div class="w-5 h-5 border-[1px] border-solid border-gray_custom rounded-[0.3rem] flex items-center justify-center">
                        <i class="fa-solid fa-check" style="color: white;"></i>
                    </div>
                    <label for="keep_login" class="text-lg font-medium cursor-pointer select-none text-blue_custom">Keep Me Logged In</label>
                </div>
                <button type="button" onclick="openForgotPassword()" class="flex text-sm font-normal hover:underline text-red_custom">Forgot Password</button>
            </div>
        </div>
        <div class="items-center justify-between md:flex">
            <p class="text-base mb-7 md:mb-0">Don't have an account? <a href="{{route('register')}}" class="cursor-pointer text-red_custom hover:underline">Sign Up</a> here</p>
            <button class="py-3 text-base font-medium text-white bg-red_custom px-11" type="submit">Login</button>
        </div>
    </form>
    <div id="modal_forgot-password"></div>
</div>
{{-- Notification when has error --}}
@if(session('ms_error'))
    <x-toast type="error" msg="{{session('ms_error')}}"/>
@endif
</body>
<script>
    let modalForgotPassword = document.getElementById('modal_forgot-password');
    function openForgotPassword(){
        modalForgotPassword.innerHTML = `<x-alert-forgot-password/>`;
    }
</script>
@stack('scripts')
</html>
