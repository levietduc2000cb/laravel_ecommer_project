//Handle change img when select img in folder on your computer
function changeInputImg(element) {
    //Get file by onchange input element
    let avatarFile = element.target.files[0];
    //Create a url from file
    let url = URL.createObjectURL(avatarFile);
    //Get img element
    let imgElement = document.querySelector(
        `label[for='${element.target.id}']>img`
    );
    //Attach url to img element
    imgElement.src = url;
}
