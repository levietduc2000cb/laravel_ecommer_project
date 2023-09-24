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

    function sendEmailJoinUs(Request $request){
        $email = $request->email;
        $data = [
            "title" => "Giới thiệu về CatBook",
            "body" => "Chào mừng đến với cửa hàng sách chúng tôi
            Chúng tôi tự hào là một điểm đến văn hóa và tri thức, nơi mà những tình yêu sách và người đam mê học hỏi có thể tìm thấy niềm vui và sự đáng kinh ngạc. Với một không gian rộng rãi và ấm cúng, cửa hàng sách của chúng tôi cung cấp một bộ sưu tập đa dạng về các thể loại sách, từ tiểu thuyết, văn học kinh điển, sách kỹ năng sống, sách giáo dục, đến sách về nghệ thuật, khoa học và nhiều lĩnh vực khác.
            Chúng tôi cam kết mang đến cho bạn trải nghiệm mua sắm sách tuyệt vời nhất. Với việc cung cấp những cuốn sách chất lượng từ các tác giả nổi tiếng và những nhà văn triển vọng, chúng tôi đảm bảo rằng bạn sẽ tìm thấy những tác phẩm đáng quan tâm và bổ ích.
            Ngoài ra, chúng tôi cũng tổ chức các buổi giao lưu với tác giả, buổi thảo luận về sách và các hoạt động văn hóa khác. Chúng tôi tin rằng việc tạo ra một không gian gặp gỡ và trao đổi văn hóa sẽ thúc đẩy sự phát triển và khám phá mới.
            Dù bạn là người đam mê đọc sách, muốn tìm kiếm kiến thức mới, hay chỉ đơn giản là muốn tìm một nơi yên tĩnh để thư giãn và lạc vào thế giới của từng trang sách, chúng tôi hy vọng rằng cửa hàng sách của chúng tôi sẽ trở thành điểm đến yêu thích của bạn.
            ",
        ];
        Mail::to($email)->send(new MailNotify($data));
        return back()->with("msg","Send email success. Please check your email");
    }
}

