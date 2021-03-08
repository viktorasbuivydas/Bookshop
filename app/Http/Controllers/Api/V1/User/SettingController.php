<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\SettingRequest;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    use ApiResponser;

    public function store(SettingRequest $request)
    {
        if(!empty($request->email)){
            auth()->user()->email = $request->email;
        }
        if(!empty($request->new_password)){
            auth()->user()->password = Hash::make($request->new_password);
        }
        auth()->user()->update();
        return $this->success('Your data changed succesfully');
    }

}
