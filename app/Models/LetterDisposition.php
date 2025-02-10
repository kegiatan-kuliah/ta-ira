<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterDisposition extends Model
{
    protected $table = 'letter_dispositions';

    protected $fillable = ['date','letter_disposition_no','instruction','in_letter_id','employee_id'];

    public function letter()
    {
        return $this->belongsTo(InLetter::class, 'in_letter_id');
    }

    public static function generateNo()
    {
        $latest = self::latest('id')->first(); // Get the latest record
        $sequence = $latest ? str_pad($latest->id + 1, 3, '0', STR_PAD_LEFT) : '001';
    
        return "{$sequence}/UNP35.7/I/TU/".date('Y');
    }
}
