<?php
//Conver number to currency VND
function convertToMoney($number){
    return number_format($number,0,',','.');
 }

 //conver time to day/month/year
 function convertDateTime($date){
   return date_format($date,"d/m/Y");
 }

 //Calculator price when has sale
 function calculatorPrice($price,$sale){
    $discount = ($sale/100)*$price;
    return $price - $discount;
 }

//Save file image in public/images/books
 function saveFileImage($request, $fileName){
    if($request->hasFile($fileName)){
        $timestamp = round(microtime(true) * 1000);
        $imageName = $timestamp.$request->file($fileName)->getClientOriginalName();
        $path = $request->file($fileName)->move(public_path('images/books'),$imageName);
        return $imageName;
    }
    return null;
}
//Handle state order
function handleStatusOrder($status){
    switch ($status) {
        case 0:
            # code...
            return 'placed';
        case 1:
            return 'shipped';
        default:
            return 'delivered';
    }
}

function renderStars($totalStars){
    $htmlStars = '';
    for ($i=0; $i < 5; $i++) {
        if($i < $totalStars){
            $htmlStars = $htmlStars.'<i class="fa-solid fa-star text-light_yellow_custom"></i>';
        }
        else{
            $htmlStars = $htmlStars.'<i class="fa-solid fa-star text-gray_custom_2"></i>';
        }
    }
    return $htmlStars;
}

?>
