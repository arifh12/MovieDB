<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person extends Model
{
    use HasFactory;

    protected $table = "PERSON";
    protected $fillable = [
        "PER_SSN",
        "PER_FNAME",
        "PER_LNAME",
        "PER_DOB",
        "PER_GENDER"
    ];
    protected $primaryKey = "PER_SSN";

    public $timestamps = false;

    public function role(): BelongsTo {
        return $this->belongsTo(Cast::class, 'PER_SSN');
    }
}
