<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "ROLE";
    protected $fillables = [
        "ROLE_ID",
        "ROLE_NAME"
    ];
    protected $primaryKey = "ROLE_ID";

    public $timestamps = false;
}
