<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function materis()
    {
        return $this->belongsToMany(Materi::class, 'materi_pemohon')->withTimestamps();
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class)->withTimestamps();
    }
}
