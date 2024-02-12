<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Library\SendSMS;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
            // $password = 12345678; //rand(111111, 999999);
            // $user->password = $password;
            // $user->save();
            // // SendSMS::sendVerification($request->mobile, $password);

             $password = rand(111111, 999999);
             $user->password = $password;
             $user->save();
             SendSMS::sendVerification($request->mobile, $password);

            return response()->json(['status' => true, 'password' => $user->password], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'user does not exist']);
        }

    }
    public function auth(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:10',
            'password' => 'required|min:5',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->messages()]);
        }
        $username = $request->username;
        $password = $request->password;
        $clientSecret = DB::table('oauth_clients')->where('id', 2)->value('secret');

        //uncomment on server
        //$response = Http::asForm()->post(env('APP_URL') . '/oauth/token' , [

        //uncomment on localhost
        $response = Http::asForm()->post('http://localhost:8001/oauth/token' , [
            'grant_type' => 'client_credentials',
            'client_id' => '2',
            'client_secret' => $clientSecret,
            'username' => $username,
            'password' => $password,
            'scope' => '',
        ]);
        return $response->json();
    }
}
