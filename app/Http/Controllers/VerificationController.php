<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function notice()
    {
        return view('auth.notice');
    }
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return view('auth.verifiy');
    }
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return "Email Verifikasi Berhasil Dikirim";
    }
}
