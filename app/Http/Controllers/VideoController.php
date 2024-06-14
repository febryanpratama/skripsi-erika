<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    //

    public function index(){

        $data = Video::get();
        return view('admin.video.index', [
            'data' => $data
        ]);
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'video' => 'required|mimes:mp4,mov,ogg,qt'
        ]);

        if ($validator->fails()) {
            # code...
            return redirect()->back()->withErrors($validator->errors()->first());
        }

        $video = $request->file('video');

        $nama_file = time()."_".str_replace(' ', '_', $video->getClientOriginalName());
        $tujuan_upload = 'video_materi';
        $video->move($tujuan_upload, $nama_file);
        $request['path'] = $nama_file;


        Video::create([
            'title' => $request->title,
            'path' => $request->path
        ]);

        return redirect()->back()->with('success', 'Video berhasil diupload');
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt'
        ]);

        if ($validator->fails()) {
            # code...
            return redirect()->back()->withErrors($validator->errors()->first());
        }

        $check = Video::where('id', $request->video_id)->first();

        if (!$check) {
            # code...
            return redirect()->back()->withErrors('Data tidak ditemukan');
        }

        $check->update([
            'title' => $request->title
        ]);

        if ($request->file('video')) {
            # code...
            $video = $request->file('video');

            $nama_file = time()."_".str_replace(' ', '_', $video->getClientOriginalName());
            $tujuan_upload = 'video_materi';
            $video->move($tujuan_upload, $nama_file);
            $request['path'] = $nama_file;

            $check->update([
                'path' => $request->path
            ]);
        }

        return redirect()->back()->with('success', 'Video berhasil diupdate');

    }

    public function delete($id){
        $check = Video::where('id', $id)->first();

        if (!$check) {
            # code...
            return redirect()->back()->withErrors('Data tidak ditemukan');
        }

        $check->delete();

        return redirect()->back()->with('success', 'Video berhasil dihapus');
    }
}
