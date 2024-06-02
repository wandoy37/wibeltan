<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pemohons()
    {
        return $this->belongsToMany(Pemohon::class, 'materi_pemohon')->withTimestamps();
    }

    public function getHargaRupiahAttribute()
    {
        return number_format($this->harga, 0, ',', '.');
    }
}
