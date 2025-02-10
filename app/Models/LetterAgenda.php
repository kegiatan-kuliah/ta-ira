<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterAgenda extends Model
{
    protected $table = 'letter_agendas';

    protected $fillable = ['agenda_no','date','in_letter_id','out_letter_id'];

    public function outLetter()
    {
        return $this->belongsTo(OutLetter::class, 'out_letter_id');
    }

    public function inLetter()
    {
        return $this->belongsTo(InLetter::class, 'in_letter_id');
    }
}
