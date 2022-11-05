<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Sekolah;

class SekolahController extends Controller
{

    public function daftar(Request $request) {

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
    
        Sekolah::create($validated);       
        Alert::success('Success Title', 'Success Message'); 
        return back();
    }

    public function kemaskini(Request $request) {
        $sekolah_id = (int)$request->route('sekolah_id');
        $sekolah = Sekolah::find($sekolah_id);
        $sekolah->save();
        Alert::success('Success Title', 'Success Message');
        return back();
    }

    public function senarai(Request $request) {
        $sekolahs = Sekolah::all();
        return view('sekolahs', compact('sekolahs'));
    }

    public function satu(Request $request) {
        $sekolah_id = (int)$request->route('sekolah_id');
        $sekolah = Sekolah::find($sekolah_id);
        return view('sekolah', compact('sekolah'));
    }        
    
}
