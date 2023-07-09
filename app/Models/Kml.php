<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kml extends Model
{
    protected $fillable = ['file_path'];

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }
}
