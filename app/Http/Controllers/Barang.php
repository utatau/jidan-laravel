<?php

namespace App\Http\Controllers;

use App\Models\Keberadaan;
use Illuminate\Http\Request;

class Barang extends Controller
{
    public function show(Request $request, $id)
{
    $token = $request->query('token');
    $keberadaan = Keberadaan::where('id', $id)
                            ->where('token', $token)
                            ->first();

    if (!$keberadaan) {
        abort(403, 'Akses ditolak. Token tidak valid atau tidak cocok.');
    }

    $data = $keberadaan->load('lantai');

    return view('barang.show', compact('data'));
}

}
