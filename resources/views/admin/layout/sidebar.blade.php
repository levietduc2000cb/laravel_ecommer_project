<style>
    #menu_mobile+#sidebar {
        transition: transform 0.5s ease-in-out;
    }

    #menu_mobile:checked+#sidebar {
        transform: translateX(0);
    }
</style>
<div class="fixed flex items-center justify-between w-full h-12 px-3 md:hidden bg-blue_custom">
    <div class="flex items-center gap-1 text-2xl font-bold text-red_custom font-roboto">Cat<span
            class="text-white">Book</span></div>
    <label for="menu_mobile" class="text-2xl text-white cursor-pointer fa-solid fa-bars"></label>
</div>
<input type="checkbox" id="menu_mobile" name="menu_mobile" hidden>
<div id="sidebar"
    class="fixed flex flex-col justify-between w-full min-h-screen py-5 overflow-y-scroll [&::-webkit-scrollbar]:hidden translate-x-[-100%] md:translate-x-0 md:w-1/6 md:static !bg-blue_custom">
    <div class="flex justify-end w-full md:hidden"><label for="menu_mobile"><i
                class="px-4 -mt-2 text-xl cursor-pointer text-gray_custom_2 hover:text-white fa-regular fa-circle-xmark"></i></label>
    </div>
    <div>
        <div class="px-4">
            <img class="w-1/4 rounded-md aspect-square"
                src="{{isset(auth()->user()->avatarUrl) ? asset('images/users/'.auth()->user()->avatarUrl) : asset('images/books/no-image.jpg')}}"
                alt="avatar">
            <div class="mt-2 text-lg font-bold text-gray_custom_4">{{auth()->user()->fullName}}</div>
            <div class="text-sm text-gray_custom_2">Admin</div>
        </div>
        <div class="mt-[10%] md:mt-[20%]">
            <a href="{{route('overview')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-house"></i>Overview
            </a>
            <a href="{{route('admin_analystics')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-chart-simple"></i>Analystics
            </a>
            <a href="{{route('admin_customers')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-users"></i>Customers
            </a>
            <a href="{{route('admin_books')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-book"></i>Books
            </a>
            <a href="{{route('admin_orders')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-box"></i>Orders
            </a>
            <a href="{{route('admin_blogs')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-box"></i>Blogs
            </a>
            <a href="{{route('admin_faqs')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-circle-question"></i>Support
            </a>
            <a href="{{route('admin_setting')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-gear"></i>Settings
            </a>
        </div>
    </div>
    <form action="{{route('handle-logout')}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="px-4 py-3 text-left text-gray_custom_2 hover:text-white">
            <i class="w-9 fa-solid fa-arrow-right-from-bracket"></i>Logout
        </button>
    </form>
</div>
