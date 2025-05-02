<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lantai extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_lantai', 'nomor_ruangan'];
    public function keberadaan()
    {
        return $this->hasMany(Keberadaan::class);
    }
    public function total()
    {
        return $this->hasMany(Total::class);
    }
}
