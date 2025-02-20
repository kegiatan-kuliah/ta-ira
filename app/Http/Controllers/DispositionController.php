<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InLetter;
use App\Models\Employee;
use App\Models\LetterDisposition;
use Carbon\Carbon;
use Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class DispositionController extends Controller
{
    public function new($letterId)
    {
        $data = InLetter::findOrFail($letterId);
        $employees = [];
        foreach(Employee::get() as $employee) {
            $employees[$employee->id] = $employee->name.' - '.$employee->user->role;
        }

        return view('pages.disposition.new')->with([
            'data' => $data,
            'employees' => $employees
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'instruction' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator);
        }

        LetterDisposition::create([
            'date' => Carbon::now(),
            'instruction' => $request->instruction,
            'in_letter_id' => $request->in_letter_id,
            'employee_id' => $request->employee_id,
            'letter_disposition_no' => LetterDisposition::generateNo()
        ]);

        return redirect()->route('in.index')->with('success', 'Surat berhasil di disposisikan');
    }

    public function print($id)
    {
        $data = LetterDisposition::findOrFail($id);

        $pdf = Pdf::loadView('pdf.report.disposition', ['data' => $data])->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
