<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "CATEGORY";
    protected $fillables = [
        "CAT_ID",
        "CAT_NAME"
    ];
    protected $primaryKey = "CAT_ID";

    public $timestamps = false;
}
