<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';

    protected $fillable = [
        'id_mitra',
        'periode',
        'total_transaksi',
        'total_pendapatan',
        'status_kinerja'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'id_mitra');
    }
}