//Handle change img when select img in folder on your computer
function changeInputImg(element) {
    //Get file by onchange input element
    let avatarFile = element.target.files[0];
    //Create a url from file
    let url = URL.createObjectURL(avatarFile);
    //Get img element
    let imgElement = document.querySelector(
        `label[for='${element.target.id}']>img`,
    );
    //Attach url to img element
    imgElement.src = url;
}

function checkUserLogin() {
    var authentication = '<?php echo auth()->check()?>';
    let modalNotiLoginContainer = document.getElementById(
        'modal_noti_login_container',
    );
    if (!authentication.trim()) {
        modalNotiLoginContainer.innerHTML = `<x-modal-noti-login/>`;
        return;
    }
}

function converToMoney(money) {
    let formattedMoney = money.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND',
    });
    return formattedMoney.slice(0, -2);
}

function renderStars(totalStar) {
    let htmlStars = '';
    for (let index = 0; index < 5; index++) {
        if (index < totalStar) {
            htmlStars +=
                '<i class="text-sm fa-solid fa-star text-orange_custom"></i>';
        } else {
            htmlStars +=
                '<i class="text-sm fa-solid fa-star text-gray_custom"></i>';
        }
    }
    return htmlStars;
}
