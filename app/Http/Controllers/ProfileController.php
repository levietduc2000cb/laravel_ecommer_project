<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\{Hash,Auth};

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $res = Users::where('id', $id)->get();
        return view('user/profile',['user'=>$res]);
    }

    public function update(Request $request, $id)
    {
        $address = $request->province.",".$request->town.",".$request->district.",".$request->location;
        $data = $request->except('_method', '_token','avatar','province','town','district','location');
        $res = Users::where('id', $id)->get('avatarUrl');
        $avatar = $res[0]->avatarUrl;
        if($request->hasFile('avatar')){
            error_log("Có avatar changed successfully");
            $path = public_path("images/users/".$avatar);
            if(File::exists($path)){
                File::delete($path);
            };
            $timestamp = round(microtime(true) * 1000);
            $imageName = $timestamp.$request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('images/users'),$imageName);
            $data['avatarUrl'] = $imageName;
        };
        $data['address'] = $address;
        $res = Users::where('id', $id)->update($data);
        if($res){
            return back()->with('msg','Profile update successfully!');
        }
        return back()->with('ms_error','Profile update failed!');
    }
    public function changePassword(Request $request){
        $password = $request->password;
        $newPassword = $request->new_password;
        $id = Auth::user()->id;
        $res = Users::where('id', $id)->get();
        if (Hash::check($password, $res[0]->password)) {
            $newPassword = Hash::make($newPassword);
            Users::where('id', $id)->update(['password' => $newPassword]);
            return back()->with('msg','Change password successfully!');
        }
        return back()->with('ms_error','Change password failed!');
    }

    public function destroy($id)
    {
        // Logic for deleting a book
    }
}
