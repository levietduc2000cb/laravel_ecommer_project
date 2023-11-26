<div id="pagination" class="flex items-center h-6">
    {{-- @php
        $route = route($nameRoute);
        if($search!=null){
            $route = $route."?search=".$search."&pagination=";
        }
        else{
            $route = $route."?pagination=";
        }
    @endphp --}}
    <div onclick="handleChangePagination(1)" class="flex items-center justify-center mt-1 w-7"><i class="fa-solid fa-angles-left"></i></div>
        @if(isset($pagination) && $pagination != null)
            @if($pagination < $count-4)
                @for($i = $pagination; $i < $pagination+4; $i++)
                    <div onclick="handleChangePagination(<?php echo($i) ?>)" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{$pagination==$i?'underline ':''}}" style="{{$pagination==$i?'color:black':''}}">{{$i}}</div>
                @endfor
            @else
                @if($pagination>5)
                    @for($i = $count-4; $i <= $count; $i++)
                        <div onclick="handleChangePagination(<?php echo($i) ?>)" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{$pagination==$i?'underline':''}}" style="{{$pagination==$i?'color:black':''}}">{{$i}}</div>
                    @endfor
                @else
                    @for($i = 1; $i <= $count; $i++)
                        <div onclick="handleChangePagination(<?php echo($i) ?>)" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{$pagination==$i?'underline':''}}" style="{{$pagination==$i?'color:black':''}}">{{$i}}</div>
                    @endfor
                @endif
            @endif
        @else
            @if($count > 5)
                @for($i = 1; $i < 5; $i++)
                    <div onclick="handleChangePagination(<?php echo($i) ?>)" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{1==$i ? 'underline':''}}" style="{{1==$i?'color:black':''}}">{{$i}}</div>
                @endfor
            @else
                @for($i = 1; $i <= $count; $i++)
                    <div onclick="handleChangePagination(<?php echo($i) ?>)" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{1==$i ? 'underline':''}}" style="{{1==$i?'color:black':''}}">{{$i}}</div>
                @endfor
            @endif
        @endif
    <div onclick="handleChangePagination(<?php echo($count) ?>)" class="flex items-center justify-center mt-1 w-7 "><i class="fa-solid fa-angles-right"></i></div>
</div>
@pushOnce('scripts')
<script>
    function handleChangePagination(pagination){
        let urlParams = new URLSearchParams(window.location.search);
        urlParams.set('pagination',pagination);
        //Change url;
        window.location.href = `${window.location.origin}${window.location.pathname}?${urlParams.toString()}`;
    }

</script>
@endPushOnce
