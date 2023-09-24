<div id="modal_noti_login_container">
</div>

@pushOnce('scripts')
<script>
    function checkUserLogin() {
    var authentication = '<?php echo auth()->check()?>';
    let modalNotiLoginContainer = document.getElementById(
        'modal_noti_login_container',
    );
    if (!authentication.trim()) {
        modalNotiLoginContainer.innerHTML = `<div id="modal_noti_login" class="fixed inset-0 z-10 flex items-center justify-center bg-modal_color">
        <div class="w-[90%] md:w-1/2 lg:w-1/3 xl:w-1/4 p-3 bg-white rounded">
            <div class="text-right"><i onclick="handleCloseModalNotiLogin()"
                    class="cursor-pointer fa-solid fa-xmark close_modal_noti_login"></i></div>
            <div class="text-center"><i class="text-5xl fa-regular fa-face-frown-open text-blue_custom"></i></div>
            <div class="mt-3 text-center">Bạn cần phải <a href="{{route('login')}}"
                    class="text-red_custom hover:underline">đăng nhập</a> để
                sử dụng chức năng
                này</div>
            <div class="flex gap-3 mt-3">
                <button onclick="handleCloseModalNotiLogin()"
                    class="flex-1 hidden py-3 rounded-md sm:block bg-gray_custom hover:opacity-95 close_modal_noti_login">Đóng</button>
                <a href="{{route('login')}}"
                    class="flex-1 py-3 text-center text-white rounded-md bg-blue_custom hover:opacity-95">Đến
                    trang đăng
                    nhập</a>
            </div>
        </div>
    </div>`
        return true;
    }
}
    function handleCloseModalNotiLogin(){
        let modalNotiLoginContainer = document.getElementById(
        'modal_noti_login_container',
    );
        modalNotiLoginContainer.innerHTML = '';
    }
</script>
@endPushOnce