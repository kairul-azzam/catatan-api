<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index(Request $request)
    {
        $catatan = $request->user()
            ->catatan()
            ->latest()
            ->get(['id', 'judul', 'isi', 'created_at']);

        return response()->json([
            'data' => $catatan,
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:100',
            'isi'   => 'required|string',
        ]);

        $catatan = $request->user()->catatan()->create($data);

        return response()->json([
            'message' => 'Catatan berhasil disimpan.',
            'data'    => $catatan,
        ], 201);
    }
}