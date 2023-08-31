<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Mail\MailNotify;
use App\Models\Users;

class MailController extends Controller
{
    function index(Request $request){
        //Find phone number to send new password
        $data = Users::select('email', 'password')->where('phone',$request->request->get('phoneNumber'))->first();
        if(!$data){
            return response()->json(['message' => 'Phone number is not valid'], 400);
        }
        $email = $data['email'];
        //Create a new password
        $newPassword = round(microtime(true) * 1000);
        $data['password'] = Hash::make($newPassword);
        //Conver data to array to update password
        $data = $data->toArray();
        //Update password in database
        $res = Users::where('phone', $request->request->get('phoneNumber'))->update($data);
        //Send email new password
        if($res){
             $data = [
                "title" => "CatBook",
                "body" => "This is your new password:".$newPassword,
            ];
            Mail::to($email)->send(new MailNotify($data));
            return response()->json(['msg' => 'Send email success. Please check your email'], 200);
        }
        return response()->json(['message' => 'Send email failure'], 500);
    }
}

