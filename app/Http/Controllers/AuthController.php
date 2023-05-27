<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\RegistrasiRequest;

class AuthController extends Controller
{
    public function get_login()
    {
        return view('auth.login');
    }

    public function post_login(Request $request)
    {
        // dd($request->all());
      
         $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
         {
            if (auth()->user()->akses == 'Admin') {
                return redirect()->route('admin.index');
            } elseif (auth()->user()->akses == 'Wajib Pajak' && auth()->user()->email_verified_at != null) {
                return redirect()->route('wajib-pajak.index');
            } 
        } 
        
        else {
            return redirect()->route('login')->with('loginError','Email dan Password Salah') ;
        }
        
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function get_registrasi()
    {
        return view('auth.registrasi');
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }
    public function post_registrasi(RegistrasiRequest $request)
    {   
        dd($request->all());
        $valid = $request->validated();
        $valid['password'] = Hash::make($valid['password']);
        $user = User::create([
                'nama' => $valid['nama'],
               'email' => $valid['email'],
               'password'=> $valid['password'],
               'akses' => 'Wajib Pajak',
               'tanggal_daftar' => $request['tanggal_daftar'],
               ]);

        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('verification.notice')->with('success','Akun berhasil dibuat silahkan verifikasi Email Anda');
        // redirect view('auth.registrasi');
    }


}
