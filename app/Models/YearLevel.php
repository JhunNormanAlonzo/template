<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class YearLevel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student() : HasOne {
        return $this->hasMany(Student::class);
    }
}
