<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    public function index()
    {
        return view('user.settings.index');
    }

    public function create()
    {

    }


    public function store(BookRequest $request)
    {


    }


    public function show($id)
    {
        //abort(404)
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
