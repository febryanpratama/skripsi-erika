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
}
