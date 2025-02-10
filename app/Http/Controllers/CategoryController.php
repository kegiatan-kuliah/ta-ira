<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use App\DataTables\CategoriesDataTable;

class CategoryController extends Controller
{
    private $table;

    public function __construct(Category $table) {
        $this->table = $table;
    }

    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('pages.category.index');
    }

    public function new()
    {
        return view('pages.category.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.category.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:categories,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->create($request->all());

        return redirect()->route('category.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:categories,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('category.index')->with('success', 'Data deleted successfully');
    }
}
