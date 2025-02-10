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

    public function generateNo()
    {
        $latest = $this->latest('id')->first(); // Get the latest record
        $sequence = $latest ? str_pad($latest->id + 1, 3, '0', STR_PAD_LEFT) : '001';
    
        return $sequence;
    }
}
