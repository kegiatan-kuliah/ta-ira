<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipient;
use Validator;
use App\DataTables\RecipientsDataTable;

class RecipientController extends Controller
{
    private $table;

    public function __construct(Recipient $table) {
        $this->table = $table;
    }

    public function index(RecipientsDataTable $dataTable)
    {
        return $dataTable->render('pages.recipient.index');
    }

    public function new()
    {
        return view('pages.recipient.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.recipient.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:recipients,name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->create($request->all());

        return redirect()->route('recipient.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:recipients,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $store = $this->table->where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('recipient.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('recipient.index')->with('success', 'Data deleted successfully');
    }
}
