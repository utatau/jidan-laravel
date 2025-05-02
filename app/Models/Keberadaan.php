<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keberadaan extends Model
{
    use HasFactory;
    protected $fillable = ['jenis_barang', 'lantai_id', 'tgl_beli', 'token'];

    public function lantai()
    {
        return $this->belongsTo(Lantai::class);
    }
    public function keberadaan()
    {
        return $this->hasMany(Total::class);
    }
    public function total()
    {
        return $this->hasMany(Total::class);
    }
}
