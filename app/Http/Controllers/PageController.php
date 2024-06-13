<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use App\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('home', ["key" => "home"]);
    }

    public function login(){
        return view('login');
    }

    public function edituser(){
        return view('edituser',["key" => ""]);
    }

    public function updateuser(Request $request){
        if($request -> passwordbaru == $request->confirmasipassword){
            $user = Auth::user();
            $user->password = bcrypt($request->passwordbaru);
            $user->save();
            return redirect('/edituser')->with('alert','Password berhasil diubah');
        }else{
            return redirect('/edituser')->with('alert','Password gagal diubah');
        }

    }
}
