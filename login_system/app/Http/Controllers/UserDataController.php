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

    public function create()
    {
        return view('userData.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        UserData::create($request->all());
        return json_encode(array(
            "statusCode"=>200
        ));
    }

}
