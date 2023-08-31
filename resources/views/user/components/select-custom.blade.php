<input type="checkbox" hidden id="{{'options-'.$mainId}}" class="custom-select_open">
<label for="{{'options-'.$mainId}}" class="flex items-center justify-between w-full px-5 cursor-pointer select-label select-custom">
    <span class="text-sm mainTitle" id={{$mainId}}>{{$mainTitle}}</span>
    <i class="fa-solid fa-angle-down"></i>
</label>
<ul class="absolute z-10 w-full text-sm leading-10 bg-white border border-solid modal-select border-gray_custom" style="top: calc(100% + 3px)">
    @foreach ($options as $option)
    <li>
        <input type="radio" class="option_custom" hidden id="{{$option['name']}}" name="{{$mainId}}" value="{{$option['value']}}">
        <label class="block w-full h-full px-5 cursor-pointer hover:bg-gray_custom_4" for="{{$option['name']}}">{{$option['content']}}</label>
    </li>
    @endforeach
</ul>
<style>
    .modal-select{
        display: none;
    }
    .custom-select_open:checked ~ .modal-select{
        display: block;
    }
    .fa-solid.fa-angle-down{
        transition: transform 0.2s ease-in-out;
    }
    .custom-select_open:checked + .select-label>.fa-solid.fa-angle-down{
        transform: rotate(180deg);
    }
    .option_custom:checked + label{
        font-weight: bold
    }
</style>
@once
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let optionCustoms = document.querySelectorAll("input[type='radio'][class='option_custom']");
        optionCustoms.forEach(option => {
        option.addEventListener("change",(e)=>{
        document.querySelector(`#${e.currentTarget.name}`).textContent = e.currentTarget.nextElementSibling.textContent;
        })
    });
})
</script>
@endpush
@endonce


