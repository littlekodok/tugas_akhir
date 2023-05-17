<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function notice()
    {
        return "Mohon verifikasi email terlebih dahulu";
    }
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return "Akun berhasil diverifikais, Selamat datang di dashboard";
    }
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return "Email Verifikasi Berhasil Dikirim";
    }
}
