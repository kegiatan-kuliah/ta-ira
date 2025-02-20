<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InLetter;
use App\Models\OutLetter;
use App\Models\LetterAgenda;

class DashboardController extends Controller
{
    public function index() {
        $inLetters = InLetter::where('type', 'IN')->count();
        $inExLetters = InLetter::where('type', 'OUT')->count();
        $outLetters = OutLetter::count();
        $agendas = LetterAgenda::count();
        return view('pages.dashboard.index')
            ->with([
                'inLetters' => $inLetters,
                'inExLetters' => $inExLetters,
                'outLetters' => $outLetters,
                'agendas' => $agendas,
            ]);
    }
}
