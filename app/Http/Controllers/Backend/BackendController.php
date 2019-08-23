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
        $rows           = $this->model;
        $rows           = $this->filter($rows);
        $rows           = $rows->paginate(10);
        $rows_trashed   = $this->model->onlyTrashed()->get();
        return view('back-end.' . $this->getTheNameFromClass() . '.index', compact('rows', 'rows_trashed'));
    }

    public function create()
    {
        return view('back-end.' . $this->getTheNameFromClass() . '.create');
    }

    public function edit($id)
    {
        $row = $this->model->findOrfail($id);
        return view('back-end.' . $this->getTheNameFromClass() . '.edit', compact('row'));
    }

    public function show($id)
    {
        $row = $this->model->findOrfail($id);
        return view('back-end.' . $this->getTheNameFromClass() . '.profile', compact('row'));
    }

    public function destroy($id)
    {            
        $row = $this->model->findOrfail($id)->delete();
        return redirect()->route($this->getTheNameFromClass() . '.index');
    }

    public function all_trashed() // Soft Delete [ all_trashed ] => Mean Showing All Records trashed
    {
        $rows_trashed = $this->model->onlyTrashed()->get();
        return view('back-end.' . $this->getTheNameFromClass() . '.trashed', compact('rows_trashed'));
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


}