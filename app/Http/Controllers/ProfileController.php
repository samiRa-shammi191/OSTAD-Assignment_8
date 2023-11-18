<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;


class ProfileController extends Controller
{
    public function index($id)
    {
        
        $name = "Donald Trump";
        $age = "75";

        $data = [
            "id" => $id,
            "name" => $name,
            "age" => $age
        ];

        $cookieName = 'access_token';
        $cookieValue = '123-XYZ';
        $minutes = 1;
        $path = '/';
        $domain = $_SERVER['SERVER_NAME'];
        $secure = false;
        $httpOnly = true;

      

        $response = new Response(json_encode($data));
        $cookie = Cookie::make($cookieName, $cookieValue, $minutes, $path, $domain, $secure, $httpOnly);
        $response->withCookie($cookie);

        return response()->json($data, 200, [], JSON_PRETTY_PRINT)->cookie($cookie);
    
    }
}
