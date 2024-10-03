<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movie extends Model
{
    use HasFactory;

    protected $table = "MOVIE";
    protected $fillable = [
        "M_ID", 
        "M_TITLE",
        "M_DATE",
        "M_SYNOPSIS",
        "M_LENGTH",
        "RATING_ID",
        "CAT_ID"
    ];
    protected $primaryKey = "M_ID";

    public $timestamps = false;

    // public function casts(): HasMany {
    //     return $this->hasMany(Cast::class, "M_ID");
    // }

    public function rating(): HasOne {
        return $this->hasOne(Rating::class, "RATING_ID");
    }

    public function category(): HasOne {
        return $this->hasOne(Category::class, "CAT_ID");
    }
}
