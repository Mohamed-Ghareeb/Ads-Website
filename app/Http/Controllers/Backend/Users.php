<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;
use App\Models\User;
use App\Http\Requests\BackEnd\Users\Store;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BackEnd\Users\Update;

class Users extends BackendController
{
    public function index()
    {
        $users = User::all();
        return view('back-end.users.index', compact('users'));
    }

    public function create()
    {
        return view('back-end.users.create');
    }


    public function store(Store $request)
    {
        // dd($request->all());
        
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('users.index');    

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrfail($id);
        return view('back-end.users.edit', compact('user'));
    }

    public function update(Update $request, $id)
    {
        $user = User::findOrfail($id);
        $data = $request->all();

        if (isset($data['password']) && $data['password'] != '') {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        $user->update($data);
        return redirect()->back();
    }


    public function destroy($id)
    {
        $user = User::findOrfail($id)->delete();
        return redirect()->route('users.index');
    }
}
