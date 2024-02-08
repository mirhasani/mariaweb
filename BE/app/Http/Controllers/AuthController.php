<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|min:10',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $user = User::where('mobile', $request->mobile)->first();
        if ($user) {
            $password = 12345678; //rand(111111, 999999);
            $user->password = $password;
            $user->save();
            // SendSMS::sendVerification($request->mobile, $password);
            return response()->json(['status' => true, 'password' => $user->password], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'user does not exist']);
        }

    }
}
