
<style>
    .animation-alert{
        animation: animation_alert ease-in-out 0.5s 1;
    }
    @keyframes animation_alert {
        from{
            transform: translateY(150%)
        }
        to{
            transform: translateY(0)
        }
    }
</style>

<div id="alert" class="fixed inset-0 flex items-center justify-center bg-modal_color">
    <div class="w-5/6 bg-white rounded-md sm:w-1/2 lg:w-1/4">
        <div class="w-full h-1 bg-green_custom"></div>
        <div class="flex justify-center py-6"><i class="text-6xl text-green_custom fa-solid fa-circle-user"></i></div>
        <div class="text-xl font-bold text-center">Forgot Password</div>
        <div class="px-2 text-base text-center">A new password will be sent to the email of phone number you previously registered</div>
        <div class="flex-col px-4 mb-5" id="phone_email_contain" style="display: flex">
            <label class="mb-[0.4rem] capitalize font-medium text-blue_custom text-base" for="phone">Your phone number</label>
            <input id="phone_email" type="tel" required class="text-base px-6 py-4 border-[1px] border-solid border-gray_custom" placeholder="Phone number" name="phone" id="phone">
        </div>
        <div id="btn_handle" class="mt-4" style="display: flex">
            <button id="btn_cancel" onclick="handleCLoseModal()" class="flex-1 py-3 bg-gray_custom_2 hover:opacity-95">Cancel</button>
            <button id="btn_send" onclick="handleSendEmail('<?php echo route('send-email');?>')" class="flex-1 py-3 text-white bg-green_custom hover:opacity-95">Send</button>
        </div>
        <div id="loading" class="my-4 text-center" style="display: none">
            <x-loading/>
            <p class="mt-1 text-base tracking-[0.4rem] text-green_custom">Sending...</p>
        </div>
    </div>
    <div id="toast_email">
    </div>
</div>

@pushOnce('scripts')
<script>
    function handleCLoseModal(){
        let alert = document.getElementById('alert');
        alert.remove();
    }
    function handleSendEmail(urlSendEmail){
        let toastEmail = document.getElementById('toast_email');
        let phoneEmailContain = document.getElementById('phone_email_contain');
        let phoneEmail = document.getElementById('phone_email');
        let btnHandle = document.getElementById('btn_handle');
        let loading = document.getElementById('loading');
        let btn_send = document.getElementById('btn_send');
        phoneNumber = phoneEmail.value.trim()
        if(!phoneNumber){
            return;
        }
        phoneEmailContain.style.display = 'none'
        btnHandle.style.display = 'none';
        loading.style.display = 'block';

        fetch(urlSendEmail,{
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ phoneNumber })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network was not responding');
            }
            return response.json();
        })
        .then(data => {
            toastEmail.innerHTML = `<x-toast type="info" msg="${data.msg}"/>`;
        })
        .catch(error => {
            toastEmail.innerHTML = `<x-toast type="error" msg="${error.message}"/>`;
        }).finally(()=>{
            loading.style.display = 'none';
            btnHandle.style.display = 'flex';
            phoneEmailContain.style.display = 'flex';
        })

    }
</script>
@endPushOnce
