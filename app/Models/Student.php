<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function yearLevel() : BelongsTo {
        return $this->belongsTo(YearLevel::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function getTotalFees()
    {
        return Fee::where('course_id', $this->course_id)
            ->where('year_level_id', $this->year_level_id)
            ->where('activation', true) // Assuming you want only active fees
            ->sum('amount');
    }

    public function getTotalPayments()
    {
        return $this->payments()->sum('amount'); // Adjust the field name if necessary
    }

    public function getBalance()
    {
        return $this->getTotalFees() - $this->getTotalPayments();
    }
}
