<form action="{{route($routeName)}}" class="flex border border-solid rounded border-gray_custom_2">
    <div id="search_input" class="relative flex-1">
        {{-- Input search --}}
        <input type="text" id="text_search" class="w-full h-full px-4 border-none outline-none" name="search" placeholder="{{$placeholder}}" value="{{$search}}" oninput="getName(event)">
        {{-- List search --}}
        <div id="list_search_name" class="absolute left-0 right-0 bg-white border border-solid top-full border-gray_custom_2">

        </div>
    </div>
    <button class="h-9 aspect-[2/1] bg-gray_custom hover:bg-gray_custom_3 hover:text-white" type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
    </button>
</form>

@pushOnce('scripts_low')
    <script>
        let routeSearch = <?php echo json_encode($routeSearch); ?>;
        //Handle change input search value when hover on element
        function onMouseOverListSearch(event) {
            let searchInput = document.getElementById("search_input");
            let inputForSearch = document.querySelector("#search_input > input");
            if (event.target.textContent == inputForSearch.textContent) {
                return;
            }
            let baseUrl = window.location.origin + window.location.pathname;
            let formElement = searchInput.parentNode;
            formElement.action = baseUrl + "?search=" + event.target.textContent;
            inputForSearch.value = event.target.textContent;
        }
        //Handle get name
        function getName(event){
            let listSearchName = document.getElementById('list_search_name');
            let runSearch;
            if(event.target.value==''){
                listSearchName.innerHTML = '';
            }
            else{
                clearTimeout(runSearch);
                runSearch = setTimeout(() => {
                    fetch(`${window.location.origin}${routeSearch}?search=${event.target.value}`)
                    .then(response => response.json())
                    .then(namebooks => {
                    listSearchName.innerHTML = '';
                    if(namebooks.length > 0) {
                        for (const name of namebooks) {
                            listSearchName.innerHTML += `<button class="w-full px-2 py-1 text-left border-none outline-none hover:bg-gray_custom_4" type="submit" onmouseover="onMouseOverListSearch(event)">${name.name || name.fullName || name.title}</button>`
                        }
                        return;
                    }
                    listSearchName.innerHTML += "<div class='px-2 py-1'>Not find result</div>"
                    return
                })
                .catch(error => {
                    alert("Search error!!!")
                });
                }, 1000);
            }

        }
    </script>
@endPushOnce
