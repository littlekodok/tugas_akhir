<?php

namespace App\Http\Controllers\API;

use Midtrans\Config;
use App\Models\Transaksi;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MidtransController extends Controller
{
    public function callback()
    {
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');
  
      $notification = new Notification();

      $status = $notification->transaction_status;
      $type = $notification->payment_type;
      $fraud = $notification->fraud_status;
      $order_id = $notification->order_id;

      $transaction = Transaksi::findOrFail($order_id);

      if($status == 'capture') {
        $transaction->update([
          'status' => 'CAPTURED'
      ]);
      }
      else if($status == 'settlement')
      {
        $transaction->update([
          'status' => 'SUCCESS'
      ]);
      }
      else if($status == 'pending')
      {
        $transaction->update([
          'status' => 'PENDING'
      ]);
      }
      else if($status == 'expire')
      {
        $transaction->update([
          'status' => 'EXPIRED'
      ]);
      }
      else if($status == 'cancel')
      {
        $transaction->update([
          'status' => 'CANCEL'
      ]);
      }

      return response()->json([
        'meta' => [
          'code' => 200,
          'message' => 'Midtrans Notification Success!'
        ]
      ]);


    }
}
