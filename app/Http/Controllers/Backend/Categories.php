<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Requests\BackEnd\Categories\Store;
use App\Http\Requests\BackEnd\Categories\Update;
use App\Models\Category;

class Categories extends BackendController
{
    public function __construct(Category $model)
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
        $data = $request->all();
        if ($request->file('icon') && $request->file('icon') != '') {
            $fileName     = $this->upload($request, 'icon', 'categories');
            $data['icon'] = '/uploads/categories/' . $fileName; 
        }

        // dd(public_path('/uploads/categories'), asset('/uploads/categories'));

        $this->model->create($data);
        return redirect()->route('back.' . $this->getTheNameFromClass() . '.index');    
    }

    public function update(Update $request, $id)
    {
        $row = $this->model->findOrfail($id);
        $data = $request->all();

        if ($request->hasFile('icon') && $request->hasFile('icon') != '') {
            $fileName     = $this->upload($request, 'icon', 'categories');
            \File::delete(public_path($row->icon));
            $data['icon'] = '/uploads/categories/' . $fileName;
        }
        $row->update($data);
        return redirect()->route('back.' . $this->getTheNameFromClass() . '.index');
    }

    public function delete($id) // Soft Delete [ delete ] => Mean Delete form Database And The Application
    {
        
        $row = $this->model->onlyTrashed()->where('id', $id)->first();
        // dd($row);
        if ($row->icon) {
            \File::delete(public_path($row->icon));
        }
        $row->forceDelete();
        return redirect()->back();
    }
}
