<?php

namespace App\Http\Controllers;

use App\Models\Keberadaan;
use Illuminate\Http\Request;

class Barang extends Controller
{
    public function show($id)
    {
        $data = Keberadaan::findOrFail($id);

        return view('barang.show', compact('data'));
    }
}
