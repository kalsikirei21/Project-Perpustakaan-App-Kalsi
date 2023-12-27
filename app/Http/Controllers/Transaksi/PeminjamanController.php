<?php

namespace App\Http\Controllers;
use App\Models\PeminjamanT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
        public function create(Request $request)
    {
        $peminjaman = new PeminjamanT;
        $peminjaman->no_peminjaman = $request->input('no_peminjaman');
        $peminjaman->books_id = $request->input('books_id');
        $peminjaman->pengunjung_id = $request->input('pengunjung_id');
        $peminjaman->pegawai_id = $request->input('pegawai_id');
        $peminjaman->save();

        return response()->json(['message' => 'Peminjaman berhasil dibuat']);
    }
    public function read()
    {
        $peminjaman = PeminjamanT::all();
        return response()->json($peminjaman);
    }

    public function updateStatus(Request $request, $no_peminjaman)
    {
        $peminjaman = PeminjamanT::where('no_peminjaman', $no_peminjaman)->first();
        $peminjaman->status = $request->input('status');
        $peminjaman->save();

        return response()->json(['message' => 'Status peminjaman berhasil diubah']);
    }
    public function delete($no_peminjaman)
    {
        PeminjamanT::where('no_peminjaman', $no_peminjaman)->delete();
        return response()->json(['message' => 'Peminjaman berhasil dihapus']);
    }
}
