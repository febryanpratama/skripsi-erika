<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function indexMateri(){
        $data = Materi::get();
        
        return view('front.materi', [
            'data'  => $data
        ]);
    }

    public function indexKontenMateri($materi_id){
        $data = Materi::with('detail')->where('id', $materi_id)->first();

        if(!$data){
            return redirect('/materi')->withErrors('Materi tidak ditemukan!');
        }
        
        return view('front.konten-materi', [
            'data'  => $data
        ]);
    }
}
