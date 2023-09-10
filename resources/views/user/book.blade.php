@extends('user/layout.app')

@section('title')
Book
@endsection

@section('header')
{{-- Header --}}
@include('user/layout/header')
@endsection

@section('footer')
{{-- Footer --}}
@include('user/layout/footer')
@endsection

<style>
    input[id="return_policy"]+#modal_return_policy {
        display: none;
    }

    input[id="return_policy"]:checked+#modal_return_policy {
        display: block;
    }
</style>

@section('content')
{{-- Title --}}
<div class="max-w-[1300px] w-full mx-auto pt-10 md:py-[6.25rem] px-3">
    <div class="grid grid-cols-1 md:grid-cols-[1.2fr,2fr] gap-12">
        <div>
            <div class="flex flex-col-reverse items-center justify-center w-full gap-2 sm:flex-row md:w-auto">
                <ul class="flex flex-row justify-center gap-3 sm:flex-col">
                    @if(isset($book->image))
                    @foreach($book->image as $key => $image)
                    <li
                        class="w-[4.75rem] aspect-square rounded cursor-pointer border border-solid border-transparent hover:border-red_custom overflow-hidden">
                        <img class="object-cover w-full h-full transition-all hover:scale-125"
                            src="{{asset('images/books/'.$image)}}" alt="img-book">
                    </li>
                    @endforeach
                    @else
                    <li
                        class="w-[4.75rem] aspect-square rounded cursor-pointer border border-solid border-transparent hover:border-red_custom overflow-hidden">
                        <img class="object-cover w-full h-full transition-all hover:scale-125"
                            src="{{asset('images/books/no-image.jpg')}}" alt="img-book">
                    </li>
                    @endif
                </ul>
                <img class="w-[24.25rem] aspect-square object-fill"
                    src="{{isset($book->image[0]) ? asset('images/books/'.$book->image[0]) : asset('images/books/no-image.jpg')}}"
                    alt="img-main">
            </div>
            <div class="flex gap-2 mt-5">
                <button
                    class="flex items-center justify-center flex-1 gap-2 py-3 font-bold border-2 border-solid rounded-lg font-roboto border-red_custom text-red_custom"><i
                        class="hidden fa-brands fa-opencart sm:inline"></i><span>Thêm vào giỏ hàng</span></button>
                <button class="flex-1 py-3 font-bold text-white rounded-lg bg-red_custom font-roboto">Mua ngay</button>
            </div>
        </div>
        <div>
            <h2 class="text-3xl font-semibold capitalize">{{$book->name}}</h2>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-5 md:gap-x-10 gap-y-1 mt-7">
                <li>Nhà cung cấp: <span class="font-bold capitalize text-darkRed_custom">{{$book->supplier}}</span>
                </li>
                <li>Tác giả: <span class="font-bold capitalize">{{$book->author}}</span></li>
                <li class="truncate">Nhà xuất bản: <span class="font-bold capitalize">{{$book->supplier}}</span></li>
                <li>Hình thức bìa: <span class="font-bold capitalize">{{$book->cover}}</span></li>
            </ul>
            <div class="mt-4 text-sm">
                <i class="fa-solid fa-star text-gray_custom_2"></i>
                <i class="fa-solid fa-star text-gray_custom_2"></i>
                <i class="fa-solid fa-star text-gray_custom_2"></i>
                <i class="fa-solid fa-star text-gray_custom_2"></i>
                <i class="fa-solid fa-star text-gray_custom_2"></i>
                <span class="text-light_yellow_custom">(0 đánh giá)</span>
            </div>
            <div class="flex items-center mt-5 gap-x-3">
                <span
                    class="text-[2rem] font-bold text-red_custom">${{convertToMoney(calculatorPrice((float)$book->price,(float)$book->sale))}}</span>
                <span class="line-through">${{$book->price}}</span>
                <span class="px-1 font-semibold text-white rounded-md bg-red_custom">-{{$book->sale}}%</span>
            </div>
            <ul class="mt-6">
                <li>Thời gian giao hàng: <span class="font-semibold capitalize">3 - 5 Ngày</span></li>
                <li>Chính sách đổi trả: <span class="font-semibold">Đổi trả sản phẩm trong 30 ngày</span>
                    <label for="return_policy"
                        class="ml-3 text-sm font-bold cursor-pointer select-none text-darkRed_custom hover:underline">
                        Xem thêm
                    </label>
                    <input type="checkbox" id="return_policy" hidden>
                    <div id="modal_return_policy" class="fixed inset-0 z-20 !bg-modal_color">
                        <div
                            class="absolute w-[97%] md:w-2/3 p-3 -translate-x-1/2 -translate-y-1/2 bg-white rounded lg:w-1/2 modal_content top-1/2 h-4/5 left-1/2">
                            <div class="flex flex-col w-full h-full">
                                <div class="flex justify-end">
                                    <label for="return_policy" class="cursor-pointer">
                                        <i class="fa-solid fa-xmark"></i>
                                    </label>
                                </div>
                                <h3 class="mb-2 text-xl font-bold text-center">CHÍNH SÁCH ĐỔI TRẢ SẢN PHẨM</h3>
                                <div class="flex-1 overflow-y-scroll">
                                    <div>
                                        <strong>1. Điều kiện đổi, trả sản phẩm</strong>
                                        <ul class="list-disc list-inside">
                                            <li>Sản phẩm bị lỗi do nhà sản xuất</li>
                                            <li>Không vi phạm các điều kiện bảo hành của Công ty</li>
                                            <li>Đầy đủ bao bì, hộp xốp (vỏ hộp, sách hướng dẫn,…), tặng phẩm kèm theo,
                                                chứng
                                                từ, Hóa đơn mua hàng, Phiếu bảo hành
                                                (nếu có)...</li>
                                            <li>CatBook có sẵn sản phẩm để đổi cho khách hàng</li>
                                            <li>Sản phẩm được mua bởi khách hàng là người dùng cuối.</li>
                                            <li>Không áp dụng với sản phẩm nguyên seal khách hàng yêu cầu thay thế.</li>
                                        </ul>
                                        <strong>
                                            2. Chính sách đổi, trả.
                                        </strong>
                                        <div>
                                            <p> Khách hàng có thể đổi sản phẩm khác hoặc trả sản phẩm và lấy lại tiền
                                                với
                                                mức phí như sau:
                                            </p>
                                            <table class="w-full text-center border">
                                                <tbody>
                                                    <tr class="h-10 border-b">
                                                        <td class="font-bold border-r" colspan="2">Tình trạng sản phẩm
                                                        </td>
                                                        <td class="font-bold border-r">Thời gian mua sản phẩm</td>
                                                        <td class="font-bold border-r">Phí đổi trả hàng</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-r">
                                                            <span class="font-semibold">Sản phẩm BỊ LỖI</span>
                                                            <br>(do nhà sản xuất)
                                                        </td>
                                                        <td class="border-b border-r">Sách</td>
                                                        <td class="h-10 border-b border-r">30 ngày đầu tiên</td>
                                                        <td class="h-10 border-b border-r">Đổi trả miễn phí</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-r">
                                                        </td>
                                                        <td class="border-r">Các sản phẩm khác</td>
                                                        <td class="h-10 border-b border-r">14 ngày đầu tiên</td>
                                                        <td class="h-10 border-b border-r">Đổi trả miễn phí</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-r ">
                                                        </td>
                                                        <td class="border-b border-r"></td>
                                                        <td class="h-10 border-b border-r">Từ ngày 15 - 30</td>
                                                        <td class="h-10 border-b border-r">Trừ 20% trên giá mua</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-r">
                                                        </td>
                                                        <td class="border-r">Tất cả sản phẩm</td>
                                                        <td class="h-10 border-b border-r">Từ ngày 31 - 45
                                                        </td>
                                                        <td class="h-10 border-b border-r">Trừ 30% trên giá mua</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-r">
                                                        </td>
                                                        <td class="border-b border-r"></td>
                                                        <td class="h-10 border-b border-r">Cứ mỗi ngày tiếp theo
                                                        </td>
                                                        <td class="h-10 border-b border-r">Thêm 0.15% trên một ngày</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-t border-r" colspan="2">
                                                            <span class="font-semibold">Sản phẩm KHÔNG BỊ LỖI</span>
                                                        </td>
                                                        <td class="h-10 border-b border-r">03 ngày đầu tiên</td>
                                                        <td class="h-10 border-b border-r">Đổi trả miễn phí</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td class="border-r"></td>
                                                        <td class="h-10 border-b border-r">Từ ngày 04 - 14</td>
                                                        <td class="h-10 border-b border-r">Trừ 10% trên giá mua</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td class="border-r"></td>
                                                        <td class="h-10 border-b border-r">Từ ngày 15 - 30</td>
                                                        <td class="h-10 border-b border-r">Trừ 25% trên giá mua</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td class="border-r"></td>
                                                        <td class="h-10 border-b border-r">Từ ngày 31 - 45
                                                        </td>
                                                        <td class="h-10 border-b border-r">Trừ 35% trên giá mua</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td class="border-b border-r"></td>
                                                        <td class="h-10 border-b border-r">Cứ mỗi ngày tiếp theo</td>
                                                        <td class="h-10 border-b border-r">Thêm 0.15% trên một ngày</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-t border-r" colspan="2">
                                                            <span class="font-semibold">Sản phẩm BỊ LỖI</span><br />(do
                                                            người sử dụng)
                                                        </td>
                                                        <td class="px-2 text-left border-b border-r" colspan="2">
                                                            Sản phẩm không còn tem bảo hành, bị rơi, va chạm, để nơi
                                                            ẩm ướt, không đủ điều kiện bảo hành của nhà sản xuất..<br />
                                                            <span class="font-semibold">=> Không áp dụng đổi trả</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border-t" colspan="4">
                                                            <div class="font-semibold">Phụ kiện của sách</div>
                                                            <div>Sản phẩm bị lỗi do nhà sản xuất: Trong 15 ngày kể từ
                                                                khi mua, khách hàng được trả sản phẩm và hoàn tiền 100%
                                                                giá trị
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <strong>
                                            3. Các lưu ý khi đổi trả sản phẩm
                                        </strong>
                                        <ul class="list-disc list-inside">
                                            <li>Nếu có hàng khuyến mại kèm theo: khách hàng phải trả lại hàng khuyến
                                                mại (còn nguyên vẹn, mới 100%) hoặc trừ giá trị tương đương tại thời
                                                điểm khuyến mại.</li>
                                            <li>Các trường hợp chịu phí đổi trả thì chi phí đổi trả được tính theo quy
                                                định của công ty tuy nhiên mức phí tối thiểu là 10.000 VNĐ/1 sản phẩm
                                            </li>
                                            <li>Trường hợp khách hàng thanh toán qua thẻ ghi nợ (Visa, Master..), khách
                                                hàng sẽ phải chịu chi phí thanh toán qua thẻ của ngân hàng.</li>
                                            <li>Nếu hoá đơn đã được xuất cho khách hàng và:
                                                <ul class="pl-8 list-decimal list-inside">
                                                    <li>Việc đổi, trả phát sinh trước ngày 15 của tháng sau thì phải hủy
                                                        hóa đơn.</li>
                                                    <li>Việc đổi, trả phát sinh từ ngày 15 của tháng sau trở đi thì
                                                        khách hàng phải xuất trả hóa đơn cho Công ty (nếu là khách hàng
                                                        tổ chức), khách hàng phải hủy hóa đơn (nếu là khách hàng cá
                                                        nhân).</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="flex items-center mt-5 gap-x-5">
                <p class="text-lg font-bold">Số lượng:</p>
                <div class="flex items-center border border-solid rounded-sm">
                    <button class="flex items-center justify-center w-8 aspect-square"
                        onclick="decreateQuantity(event)">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                    <input id="quantity_{{$book->id}}" type="number"
                        class="flex items-center justify-center w-8 text-center border-none outline-none aspect-square"
                        value=1>
                    <button class="flex items-center justify-center w-8 aspect-square" onclick="addQuantity(event)">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-20">
        <ul class="flex items-center gap-x-3">
            <li
                class="flex items-center justify-center h-10 px-6 border border-solid rounded-full cursor-pointer menu_sub hover:text-white hover:bg-red_custom hover:border-red_custom text-gray_custom_3 border-gray_custom_2 item active-bg active-color active-border">
                Mô tả</li>
            <li
                class="items-center justify-center hidden h-10 px-6 border border-solid rounded-full cursor-pointer menu_sub hover:text-white hover:bg-red_custom hover:border-red_custom text-gray_custom_3 border-gray_custom_2 item md:flex">
                Tác giả</li>
            <li
                class="flex items-center justify-center h-10 px-6 border border-solid rounded-full cursor-pointer menu_sub hover:text-white hover:bg-red_custom hover:border-red_custom text-gray_custom_3 border-gray_custom_2 item">
                Đánh giá</li>
        </ul>
        <ul class="text-base font-light leading-7 mt-11">
            <li style="display: block" class="menu_sub_content">Đắc Nhân Tâm” đưa ra những lời khuyên về cách cư xử, ứng
                xử và giao tiếp với mọi người để đạt được thành công trong cuộc sống. Đây được coi là một trong những
                cuốn sách nổi tiếng nhất, bán chạy nhất và có tầm ảnh hưởng nhất mọi thời đại mà bạn không nên bỏ qua.”
                – Cafef.vn, 20 câu nói vàng đáng nhớ từ tuyệt tác để đời “Đắc Nhân Tâm”
            </li>
            <li style="display: none" class="menu_sub_content">
                <div class="flex gap-8">
                    <img class="filter grayscale object-fill w-48 aspect-[1/1.236]"
                        src="https://th.bing.com/th/id/OIP.pefPba3wAEGVApGJ07RlqAAAAA?w=149&h=197&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                        alt="author">
                    <div>
                        <h2 class="text-4xl font-bold font-playfair first-letter:text-red_custom first-letter:text-5xl">
                            John Hoang</h2>
                        <ul class="flex flex-col gap-2 mt-4">
                            <li><span class="font-medium">Full Name : </span><span>Hoang John Nam</span></li>
                            <li><span class="font-medium">Nationality : </span><span>Vietnamese</span></li>
                            <li><span class="font-medium">Profession : </span><span>Writter</span></li>
                            <li><span class="font-medium">Famous works : </span><span>Đò sang sông, Truyện Kiều, Hoa
                                    trên lá, Con chim non,...</span></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li style="display: none" class="menu_sub_content">
                <form action="" method="post" class="p-6 border border-solid rounded border-gray_custom_2">
                    <div class="flex items-center">
                        <label for="product_quality" class="mr-5 font-medium">Product quality</label>
                        <div class="flex items-center text-sm">
                            <div class="relative flex flex-row-reverse items-center gap-1">
                                <i class="cursor-pointer fa-solid fa-star text-gray_custom_2 review_star"></i>
                                <i class="cursor-pointer fa-solid fa-star text-gray_custom_2 review_star"></i>
                                <i class="cursor-pointer fa-solid fa-star text-gray_custom_2 review_star"></i>
                                <i class="cursor-pointer fa-solid fa-star text-gray_custom_2 review_star"></i>
                                <i class="cursor-pointer fa-solid fa-star text-gray_custom_2 review_star"></i>
                                <span class="review_star_content"></span>
                            </div>
                        </div>
                    </div>
                    <label for="review" class="font-medium">Review</label>
                    <textarea id="review" class="w-full p-4 border border-solid rounded-md border-gray_custom_2"
                        id="comment" cols="30" rows="5" name="comment" placeholder="Your comment"></textarea>
                    <div class="flex justify-end"><button
                            class="px-6 py-3 font-bold text-white bg-light_yellow_custom">Review</button></div>
                </form>
                <ul class="flex flex-col gap-5 mt-5">
                    <li class="flex gap-x-3 md:gap-x-16">
                        <div>
                            <img src="https://th.bing.com/th/id/R.1f7dd3a0cf21c1d5b9f345354dce07de?rik=wTsgXpmOyKVQkg&pid=ImgRaw&r=0"
                                alt="avatar" class="w-20 rounded-full aspect-square">
                            <h3 class="text-lg font-bold text-center">Nam</h3>
                            <p class="text-base font-light text-center">08/09/2020</p>
                        </div>
                        <div>
                            <div class="text-sm">
                                <i class="fa-solid fa-star text-light_yellow_custom"></i>
                                <i class="fa-solid fa-star text-light_yellow_custom"></i>
                                <i class="fa-solid fa-star text-light_yellow_custom"></i>
                                <i class="fa-solid fa-star text-light_yellow_custom"></i>
                                <i class="fa-solid fa-star text-gray_custom_2"></i>
                            </div>
                            <p>Một cuốn sách rất bổ ích và không thể thiếu được nếu bạn có ý định học Tarot. Khi bắt đầu
                                học tarot, có thể bạn sẽ bị bối rối vì không biết bắt đầu từ đâu, cũng như là vì một bộ
                                có đến 78 lá bài. Cuốn sách này sẽ giúp bạn giải quyết vấn đề đó. Tuy sách có hơi dài và
                                đôi khi bị hơi nhàm chán, nhưng nếu chịu khó tìm hiểu và đọc thì sẽ thấy nó rất thú vị!
                                Còn nếu như bạn vẫn thấy nó quá dài, thì bạn nên giở trang mục lục và tìm xem chủ đề nào
                                làm bạn hứng thú nhất, rồi tìm hiểu về chủ đề đó, thì mới kích thích được trí tò mò mà
                                không bị nản. Tarot là một thế giới muôn hình vạn trạng, vô cùng nhiều kiến thức và nếu
                                như không chịu khó tìm hiểu thì dễ bị nản chí. Hãy cố lên bạn nhé!</p>
                        </div>
                    </li>
                    <li class="flex gap-x-3 md:gap-x-16 ">
                        <div>
                            <img src="https://th.bing.com/th/id/R.1f7dd3a0cf21c1d5b9f345354dce07de?rik=wTsgXpmOyKVQkg&pid=ImgRaw&r=0"
                                alt="avatar" class="w-20 rounded-full aspect-square">
                            <h3 class="text-lg font-bold text-center">Nam</h3>
                            <p class="text-base font-light text-center">08/09/2020</p>
                        </div>
                        <div>
                            <div class="text-sm">
                                <i class="fa-solid fa-star text-light_yellow_custom"></i>
                                <i class="fa-solid fa-star text-light_yellow_custom"></i>
                                <i class="fa-solid fa-star text-light_yellow_custom"></i>
                                <i class="fa-solid fa-star text-light_yellow_custom"></i>
                                <i class="fa-solid fa-star text-gray_custom_2"></i>
                            </div>
                            <p>Một cuốn sách rất bổ ích và không thể thiếu được nếu bạn có ý định học Tarot. Khi bắt đầu
                                học tarot, có thể bạn sẽ bị bối rối vì không biết bắt đầu từ đâu, cũng như là vì một bộ
                                có đến 78 lá bài. Cuốn sách này sẽ giúp bạn giải quyết vấn đề đó. Tuy sách có hơi dài và
                                đôi khi bị hơi nhàm chán, nhưng nếu chịu khó tìm hiểu và đọc thì sẽ thấy nó rất thú vị!
                                Còn nếu như bạn vẫn thấy nó quá dài, thì bạn nên giở trang mục lục và tìm xem chủ đề nào
                                làm bạn hứng thú nhất, rồi tìm hiểu về chủ đề đó, thì mới kích thích được trí tò mò mà
                                không bị nản. Tarot là một thế giới muôn hình vạn trạng, vô cùng nhiều kiến thức và nếu
                                như không chịu khó tìm hiểu thì dễ bị nản chí. Hãy cố lên bạn nhé!</p>
                        </div>
                    </li>
                    <li class="flex justify-center"><a href="/"
                            class="flex items-center justify-center h-10 px-6 border border-solid rounded-full cursor-pointer menu_sub hover:text-white hover:bg-red_custom text-red_custom border-red_custom">See
                            More</a></li>
                </ul>
            </li>
        </ul>
    </div>
    {{-- Related Books --}}
    <div class="mt-5 overflow-hidden">
        <h2 class="text-3xl font-bold font-playfair">Sách liên quan</h2>
        <div class="mt-[3.875rem] w-full flex relative">
            @foreach($relatedBooks as $key => $relatedBook)
            <a href="{{route('book_detail',['id'=>$relatedBook->id])}}"
                class="flex-shrink-0 w-1/2 px-2 md:px-3 sm:w-1/3 md:w-1/4 lg:w-1/6">
                <div class="bg-white cursor-pointer item">
                    <img class="object-cover w-full"
                        src="{{isset($relatedBook->image[0]) ? asset('images/books/'.$relatedBook->image[0]) : asset('images/books/no-image.jpg')}}"
                        alt="item-image">
                    <div class="px-2 pt-3 pb-5 md:px-5">
                        <h3 class="text-xl font-bold text-[rgb(26, 26, 26)] mb-2 name font-playfair truncate">
                            {{$relatedBook->name}}</h3>
                        <h4 class="text-sm font-light text-gray_custom_2">{{$relatedBook->author}}</h4>
                        <div class="px-3 py-5">
                            <div class="flex gap-1">
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-orange_custom"></i>
                                <i class="text-sm fa-solid fa-star text-gray_custom"></i>
                            </div>
                            <div class="flex items-baseline justify-between">
                                <p class="text-sm font-light">(<span class="mr-2 text-red_custom">120</span>Review)</p>
                                <p class="text-xl font-semibold text-red_custom">
                                    ${{convertToMoney(calculatorPrice((float)$relatedBook->price,(float)$relatedBook->sale))}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
{{-- Footer --}}
@endsection

@once
@push('scripts')
<script>
    //Handle quantity of book
    let idBook = '<?php echo $book->id;?>';
    function decreateQuantity(e){
        let quantityId = document.getElementById(`quantity_${idBook}`)
        if(quantityId.value - 1 < 1){
            return;
        }
        quantityId.value = Number(quantityId.value) - 1;
    }
    function addQuantity(e){
        let quantityId = document.getElementById(`quantity_${idBook}`)
        quantityId.value = Number(quantityId.value) + 1;
    }

    //Handle Menu Des of Book
    document.addEventListener('DOMContentLoaded', function() {
        let menuSubs = document.querySelectorAll(".menu_sub");
        let menuSubsContent = document.querySelectorAll(".menu_sub_content");
        menuSubs.forEach((menuSub,index) => {
            menuSub.addEventListener("click",(e)=>{
            let menuSubActive = document.querySelector(".menu_sub.active-bg.active-color.active-border");
            menuSubActive.classList.remove("active-bg","active-color","active-border");
            menuSub.classList.add("active-bg","active-color","active-border");
            menuSubsContent.forEach(menuSubContent=>menuSubContent.style.display = "none");
            menuSubsContent[index].style.display = "block";
        })
    });

})
</script>
@endpush
@endonce