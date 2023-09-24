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
                src="data:image/jpeg;base64,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"
                alt="avatar">
            <div class="mt-2 text-lg font-bold text-gray_custom_4">DucKazu</div>
            <div class="text-sm text-gray_custom_2">Admin</div>
        </div>
        <div class="mt-[10%] md:mt-[20%]">
            <a href="{{route('overview')}}"
                class="block px-4 py-3 text-base cursor-pointer text-gray_custom_2 hover:text-white">
                <i class="w-9 fa-solid fa-house"></i>Overview
            </a>
            <a href="{{route('analystics')}}"
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