<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function index(){
        $data = User::get();
        return view('admin.user.index', [
            'data' => $data
        ]);
    }

    public function store(Request $request){

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'soal' => 'required',
        ]);

        if($validator->fails()){

            // dd($validator->errors()->first());
            return redirect()->back()->withErrors($validator->errors()->first());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->assignRole('Admin');

        return redirect()->back()->withSuccess('Berhasil Menambahkan User');
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable',
        ]);

        $check = User::where('id',$request->user_id)->first();

        if(!$check){
            return redirect()->back()->withErrors('User Tidak Ditemukan');
        }

        $check->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if($request->password){
            $check->update([
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect()->back()->withSuccess('Berhasil Mengubah User');
    }

    public function delete($user_id){
        $check = User::where('id',$user_id)->first();

        if(!$check){
            return redirect()->back()->withErrors('User Tidak Ditemukan');
        }

        $check->delete();

        return redirect()->back()->withSuccess('Berhasil Menghapus User');
    }
}
