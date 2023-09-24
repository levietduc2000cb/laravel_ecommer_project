@extends('user/layout.app')

@section('title')
Cart
@endsection

@section('header')
{{-- Header --}}
@include('user/layout/header')
@endsection

@section('footer')
{{-- Footer --}}
@include('user/layout/footer')
@endsection

@section('content')
{{-- Title --}}
<x-page-title-background img="https://i1.sndcdn.com/visuals-000002429423-2fdYq5-t1240x260.jpg" titleName="Cart" />
{{-- Content --}}
<div class="max-w-[1300px] py-20 w-full px-3 md:px-0 md:mx-auto grid grid-cols-1 lg:grid-cols-[3fr,1fr] gap-6">
    <div class="px-6 bg-white border border-solid rounded border-gray_custom py-7">
        <h2 class="text-2xl font-bold font-roboto">Your shopping cart</h2>
        <ul class="flex flex-col gap-6 pb-5" id="product_cart_list">
            <li class="py-10 text-center">
                <i class="mb-5 text-4xl md:text-5xl text-darkRed_custom fa-solid fa-cart-arrow-down"></i>
                <div>Chưa có sản phẩm nào trong giỏ hàng</div>
            </li>
        </ul>
        <div class="text-base leading-6 border-t border-solid text-gray_custom_3 border-gray_custom_2">
            <div class="py-5"><i class="mr-2 text-lg fa-solid fa-truck"></i>Free Delivery within 4-5 days</div>
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            </div>
        </div>
    </div>
    <div class="w-full bg-gray_custom_4">
        <div class="p-6 bg-white border border-solid rounded-md border-gray_custom">
            <p class="text-base">Have coupon?</p>
            <div class="flex mt-2 border border-solid rounded-sm border-gray_custom">
                <input type="text" placeholder="Coupon code"
                    class="flex-1 px-3 py-1 text-base border-r border-solid border-gray_custom">
                <button class="px-2 text-xs font-medium text-center bg-gray_custom_4">APPLY</button>
            </div>
        </div>
        <div class="p-6 mt-4 bg-white border border-solid rounded-md border-gray_custom">
            <ul class="text-base leading-8">
                <li class="flex justify-between">
                    <span>Total price:</span>
                    <span id="total_price_before_discount">0 đ</span>
                </li>
                <li class="flex justify-between">
                    <span>Discount:</span>
                    <span id="discount" class="text-red_custom">0 đ</span>
                </li>
                <li class="flex justify-between"><span>TAX:</span><span id="tax">0 đ</span></li>
            </ul>
            <div class="flex justify-between py-4 mt-5 border-t border-solid border-gray_custom">
                <span>Total price:</span>
                <span id="total_price" class="font-medium">0 đ</span>
            </div>
            <div id="loading" class="my-4 text-center" style="display: none">
                <x-loading />
                <p class="mt-1 text-base tracking-[0.4rem] text-green_custom">Order...</p>
            </div>
            <div id="btn-handle">
                <button id="purchase" type="button"
                    class="w-full py-2 text-xs font-medium leading-5 text-white rounded font-roboto bg-green_custom">
                    PURCHASE
                </button>
                <a href="{{route('category')}}"
                    class="block w-full py-2 mt-3 text-xs font-medium leading-5 text-center rounded font-roboto bg-gray_custom_4">
                    BACK TO SHOP
                </a>
            </div>
        </div>
    </div>
    <div id="toast_notify">
    </div>
</div>
<script src="{{asset('/js/custom.js')}}"></script>
<script>
    var userId = @json(auth()->user()->id);
    var productCartList = document.getElementById("product_cart_list");
    var totalPriceBeforeDiscount = document.getElementById("total_price_before_discount");
    var totalPrice = document.getElementById("total_price");
    var discount = document.getElementById("discount");
    var tax = document.getElementById("tax");
    var discountNumber = 5000;
    var total = 0;
    const CART_NAME = @json(env('PRODUCTS_CART'));
    var cart = JSON.parse(localStorage.getItem(CART_NAME)) || [];
    let imageLink = '';


    //Handle caculate before discount
    function caculateTotal(){
        total = 0;
        if(cart.length === 0 || !cart){
            totalPriceBeforeDiscount.innerText = `0 đ`;
            discount.innerText = `0 đ`;
            tax.innerText = `0 đ`;
            totalPrice.innerText = `0 đ`;
            return;
        }
        for (const product of cart) {
            total += (Number(product.price) * Number(product.quantity));
        }
        totalPriceBeforeDiscount.innerText = `${converToMoney(total)} đ`;
        discount.innerText = `${converToMoney(discountNumber)} đ`;
        tax.innerText = `${converToMoney(10000)} đ`;
        totalPrice.innerText = `${converToMoney(total + 10000 + discountNumber)} đ`;
    }

    //Handle change quantity of one product
    function handleChangeQuantity(index,type){
        let quantity = document.getElementById(`quantity_${index}`);
        let priceBuy = document.getElementById(`price_buy_${index}`);
        if(type === 'decrease'){
            if(cart[index].quantity - 1 === 0){
                return;
            }
            cart[index].quantity = Number(cart[index].quantity) - 1;
            quantity.innerText = cart[index].quantity;
        }
        else{
            cart[index].quantity = Number(cart[index].quantity) + 1;
            quantity.innerText = cart[index].quantity;
        }
        priceBuy.innerText = `${converToMoney(Number(cart[index].price) * Number(cart[index].quantity))} đ`;
        localStorage.setItem(CART_NAME, JSON.stringify(cart));
        caculateTotal();
    }

    //Handle remove one product from cart
    function removeProductInCart(index){
        cart.splice(index, 1);
        localStorage.setItem(CART_NAME, JSON.stringify(cart));
        renderCartProducts();
        caculateTotal();
        window.location.reload();
    }

    //Handle render products in cart
    function renderCartProducts(){
                productCartList.innerHTML = "";
                if(cart.length > 0) {
                    let listProduct = "";
                for (const [index,product] of cart.entries()) {
                    imageLink = window.location.origin+`/images/books/${product.image}`;
                    price = Math.round(product.price - (product.sale/100 * product.price));
                    listProduct  += `<li class="flex flex-col items-start mt-6 sm:flex-row sm:gap-x-10 md:gap-x-20">
                <div class="flex">
                    <img src="${imageLink}"
                        alt="img-item"
                        class="object-contain w-24 mr-4 border border-solid aspect-[1/1.125] border-gray_custom">
                    <div class="w-full text-base">
                        <h4>${product.name}</h4>
                        <p class="font-normal text-gray_custom_3">${product.author}</p>
                    </div>
                </div>
                <div class="flex flex-col items-start flex-1 mt-4 md:items-center md:justify-end sm:flex-row sm:mt-0">
                    <div class="flex items-center mr-4 md:mr-0">
                        <div class="flex items-center mr-5 border border-solid rounded-sm md:mr-7">
                            <button class="flex items-center justify-center w-8 aspect-square" onclick="handleChangeQuantity(${index},'decrease')"><i
                                    class="fa-solid fa-minus"></i>
                            </button>
                            <span id="quantity_${index}" class="flex items-center justify-center w-8 aspect-square">${product.quantity}</span>
                            <button class="flex items-center justify-center w-8 aspect-square" onclick="handleChangeQuantity(${index},'increase')"><i
                                    class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                        <div class="w-full mr-0 md:mr-4 lg:mr-44 sm:w-28">
                            <h4 id="price_buy_${index}" class="font-semibold">${converToMoney(Number(product.price) * Number(product.quantity))} đ</h4>
                            <p class="font-normal text-gray_custom_3">${converToMoney(product.price)} đ</p>
                        </div>
                    </div class="flex items-center">
                    <button
                        onclick="removeProductInCart(${index})"
                        class="px-6 py-[0.625rem] mt-4 sm:mt-1 md:mt-0 text-xs font-medium border border-solid rounded border-gray_custom text-red_custom bg-gray_custom_4">REMOVE</button>
                </div>
            </li>`;
                }
                productCartList.innerHTML = listProduct;
                }
                else{
                    productCartList.innerHTML = `<li class="py-10 text-center">
                <i class="mb-5 text-4xl md:text-5xl text-darkRed_custom fa-solid fa-cart-arrow-down"></i>
                <div>Chưa có sản phẩm nào trong giỏ hàng</div>
            </li>`
                }

        }
    document.addEventListener('DOMContentLoaded', function() {
        let toastNotify = document.getElementById("toast_notify");
        let btnHandle = document.getElementById("btn-handle")
        renderCartProducts();
        caculateTotal()

        const purchaseBtn = document.getElementById('purchase');
        purchaseBtn.addEventListener('click', ()=>{
            //Check cart exist when send api failure
            if(!cart.customerId){
                cart = {customerId:userId, products:[...cart], total:total, tax:10000, discount: 5000, status:0 };
            }
            //Get url api store order
           let urlOrder = @json(route('user_track-order_store'));
           let urlTrackOrder = @json(route('user_track-order'));
           //Change loading interface
            loading.style.display = 'block';
            btnHandle.style.display = 'none';
            //Get fetch api
           fetch(urlOrder,{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(cart)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Tạo đơn hàng thất bại');
                }
                return response.json();
            })
            .then(data => {
                toastNotify.innerHTML = '';
                localStorage.removeItem(CART_NAME);
                window.location.replace(urlTrackOrder);
            })
            .catch(error => {
                toastNotify.innerHTML = `<x-toast type="error" msg="${error.message}"/>`;
            }).finally(()=>{
                loading.style.display = 'none';
                btnHandle.style.display = 'block';
            })
        })

    })
</script>
{{-- Footer --}}
@endsection
