<?php 

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackendController extends Controller
{
    protected $model;

    public function __construct(Model $model = null)
    {
        if (!is_null($model) && $model instanceof Model) {
            $this->model = $model;
        }
    }

    public function index()
    {
        $rows                = $this->model;
        $rows                = $this->filter($rows);
        $rows                = $rows->paginate(10);
        $rows_trashed        = $this->model->onlyTrashed()->get();
        $routeName           = $this->getTheNameFromClass();
        $moduleName          = $this->pluralModelName();
        $pageDesc            = 'From Here You Can Control The ' . $this->pluralModelName();
        $singleModuleName    = $this->ModelName();
        return view('back-end.' . $this->getTheNameFromClass() . '.index', compact(
            'rows',
            'rows_trashed', 
            'routeName',
            'moduleName',
            'pageDesc',
            'singleModuleName',
        ));
    }

    public function create()
    {
        $routeName           = $this->getTheNameFromClass();
        $moduleName          = $this->pluralModelName();
        $singleModuleName    = $this->ModelName();
        return view('back-end.' . $this->getTheNameFromClass() . '.create', compact(
            'routeName',
            'moduleName',
            'singleModuleName',

        ));
    }
    
    public function edit($id)
    {
        $row = $this->model->findOrfail($id);
        $moduleName          = $this->pluralModelName();
        $singleModuleName    = $this->ModelName();
        $routeName = $this->getTheNameFromClass();
        return view('back-end.' . $this->getTheNameFromClass() . '.edit', compact(
            'row',
            'routeName',
            'moduleName',
            'singleModuleName',
        ));
    }

    public function show($id)
    {
        $row = $this->model->findOrfail($id);
        return view('back-end.' . $this->getTheNameFromClass() . '.profile', compact('row'));
    }

    public function destroy($id)
    {            
        $row = $this->model->findOrfail($id)->delete();
        return redirect()->route('back.' . $this->getTheNameFromClass() . '.index');
    }

    public function all_trashed() // Soft Delete [ all_trashed ] => Mean Showing All Records trashed
    {
        $rows_trashed = $this->model->onlyTrashed()->get();
        $routeName = $this->getTheNameFromClass();
        return view('back-end.' . $this->getTheNameFromClass() . '.trashed', compact('rows_trashed', 'routeName'));
    }

    public function restore($id) // Soft Delete [ restore ] => Mean restoring The Trashed Records
    {
        $this->model->onlyTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }

    public function delete($id) // Soft Delete [ delete ] => Mean Delete form Database And The Application
    {
        $row = $this->model->onlyTrashed()->where('id', $id)->first()->forceDelete();
        return redirect()->back();
    }

    protected function filter($rows)
    {
        return $rows;
    }

    protected function getTheNameFromClass()
    {
        return str_plural(strtolower(class_basename($this->model)));
    }    

    protected function ModelName()
    {
        return class_basename($this->model);
    }    
   
    protected function pluralModelName()
    {
        return str_plural(class_basename($this->model));
    }    
    


}