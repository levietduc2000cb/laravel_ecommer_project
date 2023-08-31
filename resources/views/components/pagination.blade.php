<div id="pagination" class="flex items-center h-6">
    @php
        $route = route($nameRoute);
        if($search!=null){
            $route = $route."?search=".$search."&pagination=";
        }
        else{
            $route = $route."?pagination=";
        }
    @endphp
    <a href="{{$route.'1'}}" class="flex items-center justify-center mt-1 w-7"><i class="fa-solid fa-angles-left"></i></a>
        @if(isset($pagination) && $pagination != null)
            @if($pagination < $count-4)
                @for($i = $pagination; $i < $pagination+4; $i++)
                    <a href="{{$route.strval($i)}}" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{$pagination==$i?'underline ':''}}" style="{{$pagination==$i?'color:black':''}}">{{$i}}</a>
                @endfor
            @else
                @if($pagination>5)
                    @for($i = $count-4; $i <= $count; $i++)
                        <a href="{{$route.strval($i)}}" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{$pagination==$i?'underline':''}}" style="{{$pagination==$i?'color:black':''}}">{{$i}}</a>
                    @endfor
                @else
                    @for($i = 1; $i <= $count; $i++)
                        <a href="{{$route.strval($i)}}" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{$pagination==$i?'underline':''}}" style="{{$pagination==$i?'color:black':''}}">{{$i}}</a>
                    @endfor
                @endif
            @endif
        @else
            @if($count > 5)
                @for($i = 1; $i < 5; $i++)
                    <a href="{{$route.strval($i)}}" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{1==$i ? 'underline':''}}" style="{{1==$i?'color:black':''}}">{{$i}}</a>
                @endfor
            @else
                @for($i = 1; $i <= $count; $i++)
                    <a href="{{$route.strval($i)}}" class="flex items-center justify-center font-semibold w-7 hover:underline hover:text-black text-gray_custom_2 {{1==$i ? 'underline':''}}" style="{{1==$i?'color:black':''}}">{{$i}}</a>
                @endfor
            @endif
        @endif
    <a href="{{$route.strval($count)}}" class="flex items-center justify-center mt-1 w-7 "><i class="fa-solid fa-angles-right"></i></a>
</div>
