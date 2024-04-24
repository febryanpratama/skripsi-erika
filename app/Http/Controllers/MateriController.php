<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\SoalMateri;
use App\Services\MateriServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    //

    protected $materiServices;

    public function __construct(MateriServices $materiServices)
    {
        $this->materiServices = $materiServices;
    }

    public function index(){
        // dd("ok");

        $data = Materi::get();

        return view('admin.materi.index', [
            'data' => $data
        ]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nama_materi' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors()->first());
        }

        Materi::create([
            'nama_materi' => $request->nama_materi,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->withSuccess('Materi berhasil ditambahkan');
    }

    public function indexKontenMateri($materi_id){
        $check = Materi::where('id', $materi_id)->first();

        if(!$check){
            return back()->withErrors("Materi Tidak Ditemukan !!!");
        }

        $response = $this->materiServices->getDetailMateri($materi_id);

        return view('admin.materi.detailmateri', [
            'data' => $response['data'],
            'materi_id' => $materi_id
        ]);
    }

    public function indexKontenSoal($materi_id){
        $check = Materi::where('id', $materi_id)->first();

        if(!$check){
            return back()->withErrors("Materi Tidak Ditemukan !!!");
        }

        $response = $this->materiServices->getDetailSoal($materi_id);

        return view('admin.materi.detailsoal', [
            'data' => $response['data'],
            'materi_id' => $materi_id
        ]);
    }

    public function postKontenMateri(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'materi_id' => 'required|numeric|exists:materis,id',
            'nomor_section' => 'required|numeric',
            'isi_konten' => 'required',
            'voice' => 'required|mimes:mp3|max:10000',
            'gambar.*' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        if($validator->fails()){

            // dd($validator->errors()->first());
            return back()->withErrors($validator->errors()->first());
        }

        $listGambar = [];

        if($request->file('voice')){
            $voice = $request->file('voice');
            $nama_file = time()."_".str_replace(' ', '_', $voice->getClientOriginalName());
            $tujuan_upload = 'voice_materi';
            $voice->move($tujuan_upload, $nama_file);
            $request['name_voice'] = $nama_file;
        }

        foreach($request->gambar as $gambar){
            $nama_file = time() . "_" . $gambar->getClientOriginalName();
            $tujuan_upload = 'gambar_materi';
            $gambar->move($tujuan_upload, $nama_file);

            $listGambar[]['image'] = $nama_file;
        }

        // dd($listGambar);
        $response = $this->materiServices->addDetailMateri($request->all(), $listGambar);

        return back()->withSuccess($response['message']);
    }

    public function postKontenSoal(Request $request){
        $validator = Validator::make($request->all(), [
            'materi_id' => 'required|numeric|exists:materis,id',
            'soal' => 'required',
        ]);

        if($validator->fails()){
            dd($validator->errors()->first());
            return back()->withErrors($validator->errors()->first());
        }

        // dd($request->all());
        $response = $this->materiServices->addDetailSoal($request->all(), 'materi');

        return back()->withSuccess($response['message']);
    }


    public function getDetailSoal($soal_id){

        $check = SoalMateri::where('id', $soal_id)->first();

        if(!$check){
            return back()->withErrors("Soal Tidak Ditemukan !!!");
        }

        $response = $this->materiServices->getDetailSoalJawaban($soal_id);

        return view('admin.materi.jawabandetailsoal',[
            'soal_id' => $soal_id,
            'data' => $response['data']
        ]);

    }

    public function getDetailJawaban($materi_id,$soal_id){
        $check = SoalMateri::where('id', $soal_id)->first();

        if(!$check){
            return back()->withErrors("Soal Tidak Ditemukan !!!");
        }

        $response = $this->materiServices->getDetailSoalJawaban($soal_id);

        return view('admin.quiz.jawabandetailsoal',[
            'soal_id' => $soal_id,
            'materi_id' => $materi_id,
            'data' => $response['data']
        ]);

    }

    public function postDetailJawaban(Request $request){
        $validator = Validator::make($request->all(), [
            'soal_id' => 'required|numeric|exists:soal_materis,id',
            'jawaban' => 'required',
            'is_correct' => 'required|numeric'
        ]);

        if($validator->fails()){
            dd($validator->errors()->first());
            return back()->withErrors($validator->errors()->first());
        }

        $response = $this->materiServices->addJawaban($request->all());

        return back()->withSuccess($response['message']);
    }

    public function postJawaban(Request $request){

        $validator = Validator::make($request->all(), [
            'soal_id' => 'required|numeric|exists:soal_materis,id',
            'jawaban' => 'required',
            'is_correct' => 'required|numeric'
        ]);

        if($validator->fails()){
            dd($validator->errors()->first());
            return back()->withErrors($validator->errors()->first());
        }

        $response = $this->materiServices->addJawaban($request->all());

        return back()->withSuccess($response['message']);
    }


    public function indexQuiz($materi_id){
        return view('front.quiz', [
            'materi_id' => $materi_id
        ]);
    }
    // public function indexQuizNonMateri($materi_id){
    //     return view('front.quiz', [
    //         'materi_id' => $materi_id
    //     ]);
    // }

    public function indexQuizNonMateriFront($materi_id){
        // $data = SoalMateri::with('jawaban')->where('materi_id', $materi_id)->where('type', 'nonmateri')->get();
        return view('front.quiznonmateri',[
            
            'materi_id' => $materi_id
        ]);
    }

    public function indexQuizList(){
        $data = SoalMateri::with('jawaban')->where('type', 'nonmateri')->get();

        return view('admin.quiz.index', [
            'data' => $data
        ]);
    }


    public function indexQuizNonMateri($materi_id){

        $data = SoalMateri::with('jawaban')->where('materi_id', $materi_id)->where('type', 'nonmateri')->get();
        return view('admin.quiz.detailmateri',[
            'data' => $data,
            'materi_id' => 1
        ]);
    }

    public function storeQuizNonMateri(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'materi_id' => 'required|numeric|exists:materis,id',
            'soal' => 'required',
        ]);

        if($validator->fails()){
            // dd($validator->errors()->first());
            return back()->withErrors($validator->errors()->first());
        }

        // dd($request->all());
        $response = $this->materiServices->addDetailSoal($request->all(), 'nonmateri');

        return back()->withSuccess($response['message']);
    }

    public function getDetailJawabanNonMateri($soal_id){
        $response = $this->materiServices->getDetailSoalJawaban($soal_id);

        return view('admin.quiz.jawabandetailsoal',[
            'soal_id' => $soal_id,
            'data' => $response['data']
        ]);
    }

    
}
