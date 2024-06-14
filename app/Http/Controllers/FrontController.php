<?php

namespace App\Http\Controllers;

use App\Models\DetailMateri;
use App\Models\JawabanMateri;
use App\Models\Materi;
use App\Models\QuizScore;
use App\Models\SoalMateri;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function indexMateri(){
        $data = Materi::orderBy('urutan', 'ASC')->get();
        
        return view('front.materi', [
            'data'  => $data
        ]);
    }
    
    public function indexVideo(){
        $data = Video::get();

        // dd($data);
        return view('front.video', [
            'data' => $data
        ]);
    }

    public function indexQuizNonMateri(){
        return view('front.quiznonmateri');
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
        $data = DetailMateri::where('materi_id', $id)->orderBy('nomor_section', 'ASC')->get();

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
    public function getQuizNon(){
        $data = SoalMateri::with('jawaban')->where('type', 'nonmateri')->get();

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
            // dd($data['quiz'][1]['soal_id']);
            $soal_id = $data['quiz'][$i]['soal_id'];
            $jawaban_id = $data['quiz'][$i]['jawaban_id'];

            // dd($soal_id.'-'.$jawaban_id);
            $jawaban = JawabanMateri::where('soal_id', $soal_id)->where('id', $jawaban_id)->first();
            
            // dd($jawaban);
            // dd($jawaban->is_correct);
            if($jawaban->is_correct == 1){
                $listcorrect[] = 1;
            }
            // if($jawaban){
            // }
        }

        // dd($listcorrect);

        $total = count($listcorrect);

        $score = ($total / $count) * 100;

        QuizScore::create([
            'score' => $score,
            'tipe' => 'materi'
        ]);

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

    public function getJawaban(Request $request){
        $data = $request->all();

        $jawaban = JawabanMateri::where('soal_id', $data['soal_id'])->where('id', $data['jawaban_id'])->first();

        if($jawaban->is_correct == 1){
            $data = [
                "jawaban" => $jawaban->jawaban,
                "pembahasan" => $jawaban->pembahasan,
            ];
            $list = [
                'status' => true,
                'data' => $data
            ];

            return response()->json($list);
        }else{
            $getJawabanTrue = JawabanMateri::where('soal_id', $data['soal_id'])->where('is_correct', 1)->first();

            $data = [
                "jawaban" => $getJawabanTrue->jawaban,
                "pembahasan" => $getJawabanTrue->pembahasan,
            ];

            $list = [
                'status' => false,
                'data' => $data
            ];

            return response()->json($list);
        }
    }
}
