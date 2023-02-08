<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        "image",
        "girlfriend_id",
    ];

    public function girlfriends(){
        return $this->belongsTo(Girlfriend::class);
    }
}
