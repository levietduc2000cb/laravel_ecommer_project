<li class="flex items-center gap-3">
    <input onchange="handleFilterByGenres()" type="checkbox" class="rounded-checkbox {{$classCustom}}" id={{$labelKeyName}} name={{$labelKeyName}} data-id="{{$id}}" {{in_array($id, $checkedOption) ? "checked" : ""}} hidden>
    <span>
        <i class="fa-solid fa-check"></i>
    </span>
    <label for={{$labelKeyName}} class="text-base cursor-pointer text-[#232F55]">{{$name}}</label>
</li>
@pushOnce('scripts')
<script>
    function handleFilterByGenres(){
        let genres = document.querySelectorAll('.rounded-checkbox.genre');
        let genresList = [];
        let publishers = document.querySelectorAll('.rounded-checkbox.publisher');
        let publishersList = [];
        let authors = document.querySelectorAll('.rounded-checkbox.author');
        let authorsList = [];
        for (let index = 0; index < genres.length; index++) {
            if(genres[index].checked){
                genresList.push(genres[index].getAttribute("data-id"));
            }

        }
        for (let index = 0; index < publishers.length; index++) {
            if(publishers[index].checked){
                publishersList.push(publishers[index].getAttribute("data-id"));
            }

        }
        for (let index = 0; index < authors.length; index++) {
            if(authors[index].checked){
                authorsList.push(authors[index].getAttribute("data-id"));
            }

        }

        let urlParams = new URLSearchParams(window.location.search);
        urlParams.set('pagination',1);
        if(genresList.length>0){
            urlParams.set("genresList",genresList.join(','));
        }
        else{
            urlParams.delete("genresList")
        }
        if(publishersList.length>0){
            urlParams.set("publishersList",publishersList.join(','));
        }
        else{
            urlParams.delete("publishersList")
        }
        if(authorsList.length>0){
            urlParams.set("authorsList",authorsList.join(','));
        }
        else{
            urlParams.delete("authorsList")
        }
        //Change url;
        window.location.href = `${window.location.origin}${window.location.pathname}?${urlParams.toString()}`;
    }
</script>
@endPushOnce

