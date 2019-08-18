<?php 

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class BackendController extends Controller
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $rows = $rows->paginate(10);
        return view('back-end.' . $this->getTheNameFromClass() . '.index', compact('rows'));
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

    protected function filter($rows)
    {
        return $rows;
    }

    protected function getTheNameFromClass()
    {
        return str_plural(strtolower(class_basename($this->model)));
    }    


}