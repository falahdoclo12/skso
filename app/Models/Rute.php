<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $fillable = ['title', 'description'];

    public function kml()
    {
        return $this->hasOne(Kml::class);
    }
}