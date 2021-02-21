<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

    public function index()
    {
        return view('user.settings.index');
    }

    public function create()
    {

    }


    public function store(SettingRequest $request)
    {
        $user = User::find(Auth::id());
        if(!empty($request->email)){
            $user->email = $request->email;
        }
        if(!empty($request->new_password)){
            $user->password = Hash::make($request->new_password);
        }
        $user->save();
        return redirect()->route('user.settings.index')->with('success', 'Your data changed succesfully');
    }


    public function show($id)
    {
        //abort(404)
    }

    public function edit($id)
    {
        //
    }

    public function update(SettingRequest $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
