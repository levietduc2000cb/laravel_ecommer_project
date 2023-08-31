
<style>
    .animation-toast{
        animation: animation_toast ease-in-out 0.5s 1;
    }
    @keyframes animation_toast {
        from{
            transform: translateX(150%)
        }
        to{
            transform: translateX(0)
        }
    }
</style>

<div id="toast" class="toast fixed px-3 pt-2 bg-white border-b-4 border-solid rounded shadow-md {{$type == 'error' ? 'text-red_custom  border-red_custom' : 'text-green_custom border-green_custom'}} animation-toast top-10 right-10 gap-x-2">
    <div class="text-right"><i class="text-sm cursor-pointer hover:text-black text-gray_custom_2 fa-solid fa-xmark" onclick="closeToast(event)"></i></div>
    <div class="flex items-center pr-12 -translate-y-3 gap-x-7">
        <i class="translate-y-[0.1rem] fa-solid fa-check"></i>
        <span>{{$msg}}</span>
    </div>
</div>

@pushOnce('scripts')
    <script>
        function closeToast(e){
            e.target.parentNode.parentNode.remove();
        }
    </script>
@endPushOnce
