<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WisataModel;

class WisataController extends Controller
{
    public function index(){
        return WisataModel::all();
    }
    public function insertWisata(request $request){
        $wisata = new WisataModel;
        $wisata->id = $request->id;
        $wisata->judul = $request->judul;
        $wisata->artikel = $request->artikel;
        $wisata->save();

        return response($wisata);
    }
    public function updateWisata(request $request,$id){
        $judul = $request->judul;
        $artikel = $request->artikel;

        $wisata = WisataModel::find($id);
        $wisata->judul = $judul;
        $wisata->artikel = $artikel;
        $wisata->save();

        return "data berhasil di update";
    }
    public function deleteWisata($id){
        $wisata = WisataModel::find($id);
        $wisata->delete();

        return "data berhasil terhapus";
    }
}
