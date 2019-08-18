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
        return redirect()->route('users.index');    
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

}
