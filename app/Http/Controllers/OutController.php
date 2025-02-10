<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OutLetter;
use App\Models\LetterAgenda;
use Validator;
use App\DataTables\OutLettersDataTable;
use Barryvdh\DomPDF\Facade\Pdf;

class OutController extends Controller
{
    private $table;

    public function __construct(OutLetter $table, LetterAgenda $agendaTable) {
        $this->table = $table;
        $this->agendaTable = $agendaTable;
    }

    public function index(OutLettersDataTable $dataTable)
    {
        return $dataTable->render('pages.outgoing.index');
    }

    public function new()
    {
        return view('pages.outgoing.new');
    }

    public function edit($id)
    {
        $data = $this->table->findOrFail($id);
        return view('pages.outgoing.edit')->with([
            'data' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'letter_no' => 'required|min:3|unique:out_letters,letter_no',
            'letter_date' => 'required',
            'recipient' => 'required',
            'subject' => 'required',
            'attachment' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        $path = $request->file('attachment')->store('letters','public');

        $store = $this->table->create([
            'letter_no' => $request->letter_no,
            'letter_date' => $request->letter_date,
            'recipient' => $request->recipient,
            'subject' => $request->subject,
            'attachment' => $path
        ]);

        LetterAgenda::create([
            'agenda_no' => $this->agendaTable->generateNo(),
            'date' => $request->letter_date,
            'out_letter_id' => $store->id,
        ]);

        return redirect()->route('out.index')->with('success', 'Data saved successfully');
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'letter_no' => 'required|min:3|unique:out_letters,letter_no,'.$request->id,
            'letter_date' => 'required',
            'recipient' => 'required',
            'subject' => 'required'
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
            'recipient' => $request->recipient,
            'subject' => $request->subject,
            'attachment' => $path
        ]);

        LetterAgenda::where('out_letter_id', $request->id)->update([
            'date' => $request->letter_date,
        ]);

        return redirect()->route('out.index')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $data = $this->table->findOrFail($id);

        $destroy = $data->delete();

        return redirect()->route('out.index')->with('success', 'Data deleted successfully');
    }

    public function report()
    {
        $letters = $this->table->get();
        $pdf = Pdf::loadView('pdf.report.out_report', ['letters' => $letters])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
