<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;

class PayMethodController extends Controller
{
    public function vnpay_return(Request $request){

        $order = Orders::find($request->query('orderId'));
        $order->isPayMethodSuccess = 1;
        $order->save();
        return redirect(route('user_track-order'));
    }
    public function vnpay(Request $request)
    {
        $data = [];
        $data['customerId'] = $request->customerId;
        $data['status'] = $request->status;
        $data['total'] = $request->total;
        $data['products'] = $request->products;
        $data['isPayMethodSuccess'] = 0;
        $data['payMethod'] ='vnpay';
        if(isset($request->tax)){
            $data['tax'] = $request->tax;
        }
        if(isset($request->discount)){
            $data['discount'] = $request->discount;
        }
        $res = null;
        try {
            $res = Orders::create($data);
        } catch (\Throwable $th) {
            return response()->json(['msg' => 'Tạo đơn hàng thất bại'], 400);
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

        $vnp_Returnurl = route('vnpay_return',['orderId'=>$res->id]);
        $vnp_TmnCode = "YDT6U7GD";//Mã website tại VNPAY
        $vnp_HashSecret = "ZCWJSKMNCJEQCXIAVKCSADDPPTVCMAFF"; //Chuỗi bí mật

        $vnp_TxnRef = time(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán đơn đặt hàng";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->total * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
    }
}
