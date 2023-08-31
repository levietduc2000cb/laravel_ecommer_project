{{-- Contain modal delete --}}
<div id="open_modal-delete">

</div>
@pushOnce('scripts_low')
    <script>
        function openModalDelete(name,id,route) {
            let containModalDelete = document.getElementById("open_modal-delete");
            containModalDelete.innerHTML = `<x-modal-delete name="'${name}'" id="${id}" route="${route}" />`;
        }
    </script>
@endPushOnce
