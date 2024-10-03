<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $table = "SCREENING";
    protected $fillable = [
        "T_ID",
        "M_ID",
        "START_TIME",
        "STATUS"
    ];

    public $timestamps = false;
}
