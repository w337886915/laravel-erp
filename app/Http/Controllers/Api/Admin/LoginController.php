<?php

namespace App\Http\Controllers\Api\Admin;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $htttp = new Client();
        $response = $htttp->post('http://erp.whgjh.top/oauth/token',['form_params'=>[
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'GWRyCxmceimrvRrwLhguJJZi2cq28NpqqvAshZFq',
            'username' => 'admin',
            'password' => '11111111',
            'scope' => '*',
        ]]);
        dd($response);
        $usermodel = new User();
        $usermodel->name= $request->input('username');
        $usermodel->password= $request->input('password');
        $status = Auth::login($usermodel);
        dd($status);
        return response($status);
    }
}
