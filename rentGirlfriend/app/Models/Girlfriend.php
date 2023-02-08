<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Girlfriend extends Model
{
    use HasFactory;
    protected $fillable=[
        'gf_name',
        'gf_location',
        'gf_profile',
        'gf_aboutme',
        'gf_rulecan',
        'gf_rulecant',
        'gf_price1',
        'gf_price2',
        'gf_description',
        'status',
        ];
    
        public function images(){
            return $this->hasMany(Image::class);
        }
}
