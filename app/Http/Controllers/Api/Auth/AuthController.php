<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\helpers\helper;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;


class AuthController extends Controller
{
    
    private $helper;
    public function __construct()
    {
        $this->helper = new helper();
    }
    public function register(Request $request)
    {

        $validator = validator()->make($request->all(), [
        'name'=>'required|string',
        'address'=>'required|string',
        'phone'=>'required|string',
        'email'=> 'required|unique:clients,email',
        'password'=> 'required|confirmed'
        ]);
        if ($validator->fails()) {
            return $this->helper->ResponseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $token = $client->createToken('APIToken')->accessToken;
        $client->save();
        return $this->helper->ResponseJson(1, 'success', [
            'token' => $token,
            'client' => $client,
        ]);
    }

//login
    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->helper->ResponseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $client = Client::where('email', $request->email)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                $token = $client->createToken('APIToken')->accessToken;

                return $this->helper->ResponseJson(1, 'success', [
                    'token' => $token,
                    'client' => $client,
                ]);
            } else {
                return $this->helper->ResponseJson(0, 'password doesnot correct');
            }
        } else {
            return $this->helper->ResponseJson(0,'client not found');
        }
    }

    public function logout(){
    auth()->user()->token()->revoke();
    return $this->helper->ResponseJson(1, 'success');
    
    }

}
