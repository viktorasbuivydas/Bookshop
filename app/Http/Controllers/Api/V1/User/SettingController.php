<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

    public function index()
    {
        return view('user.settings.index');
    }

    public function store(SettingRequest $request)
    {
        if(!empty($request->email)){
            auth()->user()->email = $request->email;
        }
        if(!empty($request->new_password)){
            auth()->user()->password = Hash::make($request->new_password);
        }
        auth()->user()->update();
        return redirect()->route('user.settings.index')->with('success', 'Your data changed succesfully');
    }

}
