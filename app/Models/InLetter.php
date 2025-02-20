<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InLetter extends Model
{
    protected $table = 'in_letters';

    protected $fillable = ['letter_no','type','letter_date','sender','subject','attachment','category_id','level_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function disposition()
    {
        return $this->hasOne(LetterDisposition::class, 'in_letter_id');
    }
}
