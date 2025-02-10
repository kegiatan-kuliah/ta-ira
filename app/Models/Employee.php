<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['name','identity_no','rank','phone_no','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
