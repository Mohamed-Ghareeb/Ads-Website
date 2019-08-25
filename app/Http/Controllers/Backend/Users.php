<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;
use App\Models\User;
use App\Http\Requests\BackEnd\Users\Store;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BackEnd\Users\Update;
use App\Http\Requests\BackEnd\Users\UpdateProfile;

class Users extends BackendController
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    
    /*
    
        I Will Use This Function In Part Searching And Filtering
    
    */

    // protected function filter($rows)
    // {
    //     if (request()->has('name') && request('name') != '') {
            
    //         $rows = $rows->where('name', request('name'));
    //     }

    //     return $rows;
    // }


    public function store(Store $request)
    {
        // dd($request->all());
        
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $this->model->create($data);
        return redirect()->route('back.' . $this->getTheNameFromClass() . '.index');    
    }

    public function update(Update $request, $id)
    {
        $row = $this->model->findOrfail($id);
        $data = $request->all();

        if (isset($data['password']) && $data['password'] != '') {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        $row->update($data);
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        if (auth()->user()->id != $id) {
            $row = $this->model->findOrfail($id)->delete();
        }
        return redirect()->route('back.' . $this->getTheNameFromClass() . '.index');
    }

    public function edit($id)
    {
        if (auth()->user()->id == $id) {
            return redirect()->route('back.' . $this->getTheNameFromClass() . '.show', ['id' => $id]);
        } else {
            $row = $this->model->findOrfail($id);
        }
        // dd($this->model->findOrfail($id), 'uuuuuuuuuu');

        return view('back-end.' . $this->getTheNameFromClass() . '.edit', ($row != null) ? compact('row') : '');
    }

    public function updateProfile(UpdateProfile $request)
    {
        $row  = $this->model->findOrfail(auth()->user()->id);
        $array = [];

        if ($request->email != $row->email) {
            $email = $this->model->where('email', $request->email)->first();
            if ($email == null) {
                $array['email'] = $request->email;
            }
        }

        if ($request->name != $row->name) {
            $array['name'] = $request->name;
        }

        if ($request->password != '') {
            $array['password'] = Hash::make($request->password);
        }

        if (!empty($array)) {
            $row->update($array);
        }

        return redirect()->back();
    }

}
