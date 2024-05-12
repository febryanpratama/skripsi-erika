<?php

namespace App\Services;

use App\Models\DetailMateri;
use App\Models\JawabanMateri;
use App\Models\SoalMateri;

class MateriServices{
    static function getDetailMateri($materi_id){
        $data = DetailMateri::where('materi_id', $materi_id)->get();

        return [
            "status" => true,
            "message" => "Berhasil Mendapatkan Detail Materi",
            "data" => $data
        ];
    }

    static function getDetailSoal($materi_id){
        $data = SoalMateri::where('materi_id', $materi_id)->get();

        // dd($data);
        return [
            "status" => true,
            "message" => "Berhasil Mendapatkan Detail Soal",
            "data" => $data
        ];
    }

    static function addDetailMateri($data, $listGambar){
        // dd($listGambar);
        // dd($data);

        DetailMateri::create([
            'materi_id' => $data['materi_id'],
            'nomor_section' => $data['nomor_section']??0,
            'isi_konten' => $data['isi_konten'],
            'gambar' => json_encode($listGambar),
            'voice' => $data['name_voice'] ?? NULL
        ]);

        return [
            "status" => true,
            "message" => "Berhasil Menambahkan Detail Materi"
        ];
    }

    static function addDetailSoal($data, $type){
        SoalMateri::create([
            'materi_id' => $type == 'nonmateri' ? 0 : $data['materi_id'],
            'soal' => $data['soal'],
            'type' => $type,
        ]);

        return [
            "status" => true,
            "message" => "Berhasil Menambahkan Detail Soal"
        ];
    }

    static function getDetailSoalJawaban($soal_id){

        $data = JawabanMateri::where('soal_id', $soal_id)->get();

        return [
            'status' => true,
            'message' => 'Berhasil Mendapatkan Detail Jawaban',
            'data' => $data
        ];
    }

    static function addJawaban($data){

        if($data['is_correct'] == 1){
            JawabanMateri::where('soal_id', $data['soal_id'])->update([
                'is_correct' => 0
            ]);
        }

        JawabanMateri::create([
            'soal_id' => $data['soal_id'],
            'jawaban' => $data['jawaban'],
            'is_correct' => $data['is_correct'],
            'pembahasan' => $data['pembahasan']
        ]);

        return [
            "status" => true,
            "message" => "Berhasil Menambahkan Jawaban"
        ];
    }

    static function editJawaban($data){
        if($data['is_correct'] == 1){
            JawabanMateri::where('soal_id', $data['soal_id'])->update([
                'is_correct' => 0
            ]);
        }

        JawabanMateri::where('id', $data['jawaban_id'])->update([
            'jawaban' => $data['jawaban'],
            'is_correct' => $data['is_correct'],
            'pembahasan' => $data['pembahasan']
        ]);

        return [
            "status" => true,
            "message" => "Berhasil Mengedit Jawaban"
        ];
    }
}