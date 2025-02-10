<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LetterAgendasDataTable;

class AgendaController extends Controller
{
    public function index(LetterAgendasDataTable $dataTable)
    {
        return $dataTable->render('pages.agenda.index');
    }
}
