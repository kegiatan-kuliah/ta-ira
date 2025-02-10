<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InLetter;
use App\Models\Category;
use App\Models\Level;
use App\Models\LetterAgenda;
use Validator;
use App\DataTables\InLettersDataTable;

class InController extends Controller
{
    private $table;

    public function __construct(InLetter $table, LetterAgenda $agendaTable) {
        $this->table = $table;
        $this->agendaTable = $agendaTable;
    }

    public function index(InLettersDataTable $dataTable)
    {
        return $dataTable->render('pages.incoming.index');
    }

    public function new()
    {
        $categories = Category::pluck('name','id');
        $levels = Level::pluck('name','id');
        return view('pages.incoming.new')->with([
            'categories' => $categories,
            'levels' => $levels
        ]);
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        $categories = Category::pluck('name','id');
        $levels = Level::pluck('name','id');
        return view('pages.incoming.edit')->with([
            'data' => $data,
            'categories' => $categories,
            'levels' => $levels
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'letter_no' => 'required|min:3|unique:in_letters,letter_no',
            'letter_date' => 'required',
            'sender' => 'required',
            'subject' => 'required',
            'attachment' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $path = $request->file('attachment')->store('letters','public');

        $store = $this->table->create([
            'letter_no' => $request->letter_no,
            'letter_date' => $request->letter_date,
            'sender' => $request->sender,
            'subject' => $request->subject,
            'category_id' => $request->category_id,
            'level_id' => $request->level_id,
            'attachment' => $path
        ]);

        LetterAgenda::create([
            'agenda_no' => $this->agendaTable->generateNo(),
            'date' => $request->letter_date,
            'in_letter_id' => $store->id,
        ]);

        return redirect()->route('in.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'letter_no' => 'required|min:3|unique:in_letters,letter_no,'.$request->id,
            'letter_date' => 'required',
            'sender' => 'required',
            'subject' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $letter = $this->table->findOrFail($request->id);

        if($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('letters','public');
        } else {
            $path = $letter->attachment;
        }

        $store = $this->table->where('id', $request->id)->update([
            'letter_no' => $request->letter_no,
            'letter_date' => $request->letter_date,
            'sender' => $request->sender,
            'subject' => $request->subject,
            'attachment' => $path,
            'category_id' => $request->category_id,
            'level_id' => $request->level_id,
        ]);

        LetterAgenda::where('in_letter_id', $request->id)->update([
            'date' => $request->letter_date,
        ]);

        return redirect()->route('in.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('in.index')->with('success', 'Data deleted successfully');
    }
}
