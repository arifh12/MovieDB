<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    protected $table = "THEATER";
    protected $fillable = [
        "T_ID",
        "T_NAME"
    ];
    protected $primaryKey = "T_ID";

    public $timestamps = false;
}
