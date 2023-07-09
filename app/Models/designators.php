<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class designators extends Model
{
    use HasFactory;

    protected $fillable = [
        'designator',
        'uraian_pekerjaan',
        'satuan',
        'material',
        'jasa',
        'volume'
    ];
}
