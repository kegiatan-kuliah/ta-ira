<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterDisposition extends Model
{
    protected $table = 'letter_dispositions';

    protected $fillable = ['date','letter_disposition_no','instruction','in_letter_id','employee_id'];
}
