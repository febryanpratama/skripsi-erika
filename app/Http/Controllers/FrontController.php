<?php

namespace App\Http\Controllers;

use App\Models\DetailMateri;
use App\Models\Materi;
use App\Models\SoalMateri;
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

        // dd($data);
        if(!$data){
            return redirect('/materi')->withErrors('Materi tidak ditemukan!');
        }
        
        return view('front.konten-materi', [
            'data'  => $data,
            'detail' => json_encode($data->detail)
        ]);
    }

    public function getDetailKontenMateri($id){
        $data = DetailMateri::where('materi_id', $id)->get();

        return response()->json([
            'status' => true,
            'message' => 'Success Get data',
            'data' => $data
        ]);
        
    }


    public function getQuiz($materi_id){
        $data = SoalMateri::with('jawaban')->where('materi_id', $materi_id)->where('type', 'materi')->get();

        return response()->json([
            'status' => true,
            'message' => 'Success Get data',
            'data' => $data
        ]);
    }
}
