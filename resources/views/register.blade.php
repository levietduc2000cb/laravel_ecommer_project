<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    @php
        $name = old('name') ? old('name') : 'Name';
        $email = old('email') ? old('email') : 'Email';
        $phone = old('phone') ? old('phone') : '1234567890';
        $password = old('password') ? old('password') : '123456';
    @endphp
<div class="flex items-center justify-center min-h-screen">
    <form action="{{route('handle-register')}}" method="POST" class="max-w-[700px] w-full shadow-2xl p-5 md:p-12 m-2 md:m-4 lg:m-0">
        <h1 class="mb-4 text-3xl font-bold text-center text-blue_custom">Sign Up</h1>
        <p class="mb-4 text-base font-light text-center">Create your account to get full access</p>
        <div class="pt-[2.2rem] pb-5 md:pb-[3.75rem]">
            @csrf
            <div class="flex flex-col mb-5">
                <label class="mb-[0.4rem] capitalize text-lg font-medium text-blue_custom" for="fullName">Full Name</label>
                <input type="text" required value="{{$name}}" class="peer text-base px-6 py-4 border-[1px] border-solid border-gray_custom" placeholder="Enter full name" name="fullName" id="fullName">
                <p class="invisible peer-invalid:visible text-red_custom">Please enter your full name</p>
            </div>
            <div class="flex flex-col mb-5">
                <label class="mb-[0.4rem] capitalize text-lg font-medium text-blue_custom" for="email">Email Address</label>
                <input type="{{$email}}" required value="Exam@gmail.com" class="peer text-base px-6 py-4 border-[1px] border-solid border-gray_custom" placeholder="Enter email address" name="email" id="email">
                <p class="invisible peer-invalid:visible text-red_custom">Please enter your valid email</p>
            </div>
            <div class="flex flex-col mb-5">
                <label class="mb-[0.4rem] capitalize text-lg font-medium text-blue_custom" for="phone">Phone number</label>
                <input type="tel" required value="{{$phone}}" class="peer text-base px-6 py-4 border-[1px] border-solid border-gray_custom" placeholder="Enter phone number" name="phone" id="phone">
                <p class="invisible peer-invalid:visible text-red_custom">Please enter your phone number</p>
            </div>
            <div class="flex flex-col mb-5">
                <label class="mb-[0.4rem] capitalize text-lg font-medium text-blue_custom" for="password">Password</label>
                <div class="relative w-full">
                    <input type="password" value="{{$password}}" required class="peer w-[85%] md:w-[90%] text-base px-6 py-4 border-[1px] border-solid border-gray_custom" placeholder="Enter password" name="password" id="password">
                    <p class="invisible peer-invalid:visible text-red_custom">Please enter your password</p>
                    <button type="button" id="button_change-type-password" class="w-[15%] md:w-[10%] absolute right-0 top-0 h-[70%] bg-gray_custom">
                        <i class="fa-solid fa-eye-slash"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="items-center justify-between md:flex">
            <p class="text-base mb-7 md:mb-0">Already have an account? <a href="{{route('login')}}" class="cursor-pointer text-red_custom hover:underline">Login</a> here</p>
            <button class="py-3 text-base font-medium text-white bg-red_custom px-11" type="submit">Sign Up</button>
        </div>
    </form>
</div>
{{-- Notification when has error --}}
@if(session('ms_error'))
    <x-toast type="error" msg="{{session('ms_error')}}"/>
@endif
@if(session('msg'))
    <x-toast type="info" msg="{{session('msg')}}"/>
@endif
</body>
<script>
    let inputPassword = document.querySelector('input[type=password]');
    let buttonChangeTypePassword = document.getElementById('button_change-type-password');
    buttonChangeTypePassword.addEventListener('click', (e)=>{
        inputPassword.type = inputPassword.type == "password" ? "text" :"password";
        buttonChangeTypePassword.innerHTML = inputPassword.type == 'password' ? '<i class="fa-solid fa-eye-slash"></i>' : '<i class="fa-solid fa-eye"></i>';
    })
</script>
@stack('scripts')
</html>
