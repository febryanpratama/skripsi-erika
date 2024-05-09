<?php

namespace App\Http\Controllers;

use App\Models\DetailMateri;
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

    public function edit(Request $request){
        $validator = Validator::make($request->all(), [
            'materi_id' => 'required|numeric|exists:materis,id',
            'nama_materi' => 'required',
            'deskripsi' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors()->first());
        }

        $materi = Materi::where('id', $request->materi_id)->first();

        if(!$materi){
            return back()->withErrors("Materi Tidak Ditemukan !!!");
        }

        $materi->update([
            'nama_materi' => $request->nama_materi,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->withSuccess('Materi berhasil diubah');
    }

    public function setOrdering(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'detail_materi_id' => 'required|numeric',
            'nomor_section' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors()->first());
        }

        $detailMateri = DetailMateri::where('id', $request->detail_materi_id)->first();

        if(!$detailMateri){
            return back()->withErrors("Materi Tidak Ditemukan !!!");
        }

        $detailMateri->update([
            'nomor_section' => $request->nomor_section
        ]);

        return back()->withSuccess('Ordering Materi berhasil diubah');
    }

    public function delete($materi_id){
        $check = Materi::where('id', $materi_id)->first();

        if(!$check){
            return back()->withErrors("Materi Tidak Ditemukan !!!");
        }

        Materi::where('id', $materi_id)->delete();

        return back()->withSuccess('Materi Berhasil Dihapus');
    }

    public function indexKontenMateri($materi_id){
        $check = Materi::with('detail')->where('id', $materi_id)->first();

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
            // 'nomor_section' => 'required|numeric',
            'isi_konten' => 'required',
            'voice' => 'nullable|mimes:mp3|max:10000',
            'gambar.*' => 'nullable|mimes:jpg,jpeg,png,mp4,mkv|max:10000'
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

        if($request->gambar != null){

            foreach($request->gambar as $gambar){
                $nama_file = time() . "_" . $gambar->getClientOriginalName();
                $tujuan_upload = 'gambar_materi';
                $gambar->move($tujuan_upload, $nama_file);
    
                $listGambar[]['image'] = $nama_file;
            }
        }


        // dd($listGambar);
        $response = $this->materiServices->addDetailMateri($request->all(), $listGambar);

        return back()->withSuccess($response['message']);
    }

    public function deleteDetailMateri($detail_materi_id){
        $check = DetailMateri::where('id', $detail_materi_id)->first();

        if(!$check){
            return back()->withErrors("Detail Materi Tidak Ditemukan !!!");
        }
        
        DetailMateri::where('id', $detail_materi_id)->delete();

        return back()->withSuccess('Detail Materi Berhasil Dihapus');
        
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

    public function postKontenSoalEdit(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'soal_id' => 'required|numeric|exists:soal_materis,id',
            'soal' => 'required',
        ]);

        if($validator->fails()){
            // dd($validator->errors()->first());
            return back()->withErrors($validator->errors()->first());
        }

        // dd($request->all());
        SoalMateri::where('id', $request->soal_id)->update([
            'soal' => $request->soal
        ]);

        return back()->withSuccess("Soal Berhasil Diubah");
    }

    public function deleteDetailSoal($soal_id){
        $check = SoalMateri::where('id', $soal_id)->first();

        if(!$check){
            return back()->withErrors("Soal Tidak Ditemukan !!!");
        }

        SoalMateri::where('id', $soal_id)->delete();

        return back()->withSuccess('Soal Berhasil Dihapus');
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

    public function postJawabanEdit(Request $request){
        $validator = Validator::make($request->all(), [
            'jawaban_id' => 'required|numeric|exists:jawaban_materis,id',
            'jawaban' => 'required',
            'is_correct' => 'required|numeric'
        ]);

        if($validator->fails()){
            dd($validator->errors()->first());
            return back()->withErrors($validator->errors()->first());
        }

        $response = $this->materiServices->editJawaban($request->all());

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
