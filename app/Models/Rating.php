<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = "RATING";
    protected $fillable = [
        "RATING_ID",
        "RATING_NAME"
    ];
    protected $primaryKey = "RATING_ID";

    public $timestamps = false;
}
