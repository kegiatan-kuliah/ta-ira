<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutLetter extends Model
{
    protected $table = 'out_letters';

    protected $fillable = ['letter_no','letter_date','recipient','subject','attachment'];
}
