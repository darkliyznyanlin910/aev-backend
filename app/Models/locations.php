<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locations extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'px',
        'py',
        'pz',
        'ox',
        'oy',
        'oz',
        'ow',
    ];
}
