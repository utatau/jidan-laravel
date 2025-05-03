<?php

namespace App\Http\Controllers;

use App\Models\Total;
use App\Models\Barang;
use App\Models\Keberadaan;
use Illuminate\Http\Request;

class Scan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Total::all();
        return view('barang.index', compact('data'));
    }
	public function scan(Request $request)
{
    $token = $request->query('token');

    $keberadaan = Keberadaan::where('token', $token)->first();

    if (!$keberadaan) {
        return response()->json([
            'success' => false,
            'message' => 'Token tidak ditemukan.'
        ], 404);
    }

    // Redirect dengan menyertakan token
    return redirect()->route('barang.show', [
        'id' => $keberadaan->id,
        'token' => $token
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
