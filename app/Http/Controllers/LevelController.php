<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use Validator;
use App\DataTables\LevelsDataTable;

class LevelController extends Controller
{
    private $table;

    public function __construct(Level $table) {
        $this->table = $table;
    }

    public function index(LevelsDataTable $dataTable)
    {
        return $dataTable->render('pages.level.index');
    }

    public function new()
    {
        return view('pages.level.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.level.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:levels,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->create($request->all());

        return redirect()->route('level.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:levels,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('level.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('level.index')->with('success', 'Data deleted successfully');
    }
}
