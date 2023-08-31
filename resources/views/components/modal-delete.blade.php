<div class='fixed inset-0 bg-[rgba(0,0,0,0.5)] flex justify-center items-center' id='modal-delete'>
    <form action="{{$route}}" class='p-5 mx-3 bg-white rounded-lg' method='POST'>
        @method('delete')
        @csrf
        <div class='flex justify-end'>
            <label class='cursor-pointer' onclick="deleteModalDelete()">
                <i class='fa-solid fa-xmark'></i>
            </label>
        </div>
        <h2 class='font-semibold'>Are you sure delete {{$name}}?</h2>
        <p class='py-2 text-gray_custom_3'>If you delete the {{$name}} you can't recover it</p>
        <div class='flex justify-end mt-3 gap-x-3'>
            <button type="button" class='px-2 py-1 bg-white border border-solid rounded cursor-pointer border-gray_custom_2 hover:bg-gray_custom' onclick="deleteModalDelete()">Cancel</button>
            <button type='submit' class='px-2 py-1 text-white rounded bg-red_custom hover:bg-darkRed_custom'>Delete</button>
        </div>
    </form>
</div>


@pushOnce('scripts')
<script>
    function deleteModalDelete(){
        let modalDelete = document.getElementById('modal-delete');
        modalDelete.remove();
    }
</script>
@endPushOnce

