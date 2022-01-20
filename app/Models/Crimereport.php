<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crimereport extends Model
{
    use HasFactory;
    protected $fillable = [
        'casetype',
        'date_case',
        'picture',
        'description',
        'police_desc',
        'location',
    ];
}
