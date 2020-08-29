<?php

namespace App\Http\Controllers;
use App\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    //data fetch
    public function index()
    {
        return view('userData.index');
    }

    public function getUserData(){
        $userData = UserData::get();
        return json_encode(array('data'=>$userData));
    }

    

}
