<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QoS extends Model
{
    use HasFactory;

    protected $table = 'qos';

    protected $fillable = [
        'availability',
        'packet_loss',
        'throughput',
        'latency',
        'jitter',
        'pm',
        'ttr',
        'nilai_avail',
        'nilai_pl',
        'nilai_t',
        'nilai_l',
        'nilai_j',
        'nilai_pm',
        'nilai_ttr',
    ];
}
