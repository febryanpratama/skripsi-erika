<?php

namespace App\Http\Controllers;

use App\Models\DetailMateri;
use App\Models\JawabanMateri;
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
    
    public function getQuizNonMateri($materi_id){
        $data = SoalMateri::with('jawaban')->where('materi_id', $materi_id)->where('type', 'nonmateri')->get();

        return response()->json([
            'status' => true,
            'message' => 'Success Get data',
            'data' => $data
        ]);
    }

    public function submitQuiz(Request $request){
        // dd($request->all());

        $data = $request->all();

        // dd($data);

        $count = count($data['quiz']);

        $listcorrect = [];

        for($i = 0; $i < $count; $i++){
            // dd($data['quiz'][$i]);
            $jawaban = JawabanMateri::where('soal_id', $data['quiz'][$i]['soal_id'])->where('id', $data['quiz'][$i]['jawaban_id'])->first();
            if($jawaban->is_correct == 1){
                $listcorrect[] = 1;
            }
        }

        $total = count($listcorrect);

        $score = ($total / $count) * 100;

        return response()->json([
            'status' => true,
            'message' => 'Success Get data',
            'score' => $score
        ]);
    }

    public function indexQuiz(){
        return view('front.quiz');
    }

    public function indexBantuan(){
        return view('front.bantuan');
    }
}
