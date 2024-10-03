<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cast extends Model
{
    use HasFactory;

    protected $table = "CAST";
    protected $fillable = [
        "CHAR_NAME",
        "M_ID",
        "PER_SSN",
        "ROLE_ID"
    ];
    
    public $timestamps = false;

    public function role(): HasOne {
        return $this->hasOne(Role::class, 'ROLE_ID');
    }
}
