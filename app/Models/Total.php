<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Total extends Model
{
    use HasFactory;
    protected $fillable = ['keberadaan_id', 'lantai_id'];
    public function jumlah()
    {
        $totalBangku101 = Keberadaan::where('jenis_barang', 'bangku')
            ->whereHas('lantai', function ($query) {
                $query->where('nomor_ruangan', '101');
            })
            ->count();
    }
    public function lantai()
    {
        return $this->belongsTo(Lantai::class);
    }
    public function keberadaan()
    {
        return $this->belongsTo(Keberadaan::class);
    }
}
