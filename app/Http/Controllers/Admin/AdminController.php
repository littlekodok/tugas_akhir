<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\ObjekPajak;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $tasks = ObjekPajak::all();
        $hotelDiterima = $tasks->where('id_jenis_pajak', 1)->where('validasi','Diterima');       
        $restoranDiterima = $tasks->where('id_jenis_pajak', 2)->where('validasi','Diterima');
        $hiburanDiterima = $tasks->where('id_jenis_pajak', 3)->where('validasi','Diterima');
        $parkirDiterima = $tasks->where('id_jenis_pajak', 4)->where('validasi','Diterima');

        $totalHotel = transaksi::where('id_jenis_pajak', 1)->where('status','SUCCESS')->whereMonth('created_at', Carbon::now()->format('m'))->sum('total_pajak');
        $totalRestoran = Transaksi::where('id_jenis_pajak', 2)->where('status','SUCCESS')->whereMonth('created_at', Carbon::now()->format('m'))->sum('total_pajak');
        $totalHiburan = Transaksi::where('id_jenis_pajak', 3)->where('status','SUCCESS')->whereMonth('created_at', Carbon::now()->format('m'))->sum('total_pajak');
        $totalParkir = Transaksi::where('id_jenis_pajak', 4)->where('status','SUCCESS')->whereMonth('created_at', Carbon::now()->format('m'))->sum('total_pajak');
        // dd($totalHiburan);

        $pajakHotelBaru = Transaksi::orderBy('id', 'DESC')->where('id_jenis_pajak', 1)->where('status','SUCCESS')->first(); 
        $pajakRestoranBaru = Transaksi::orderBy('id', 'DESC')->where('id_jenis_pajak', 2)->where('status','SUCCESS')->first(); 
        $pajakHiburanBaru = Transaksi::orderBy('id', 'DESC')->where('id_jenis_pajak', 3)->where('status','SUCCESS')->first(); 
        $pajakParkirBaru = Transaksi::orderBy('id', 'DESC')->where('id_jenis_pajak', 4)->where('status','SUCCESS')->first(); 

        $transaksiBaru = Transaksi::latest()->take(7)->get();
        // dd($pajakParkirBaru != null ? number_format($pajakParkirBaru->total_pajak) : '0');      

        $grafikRestoran = Transaksi::where('id_jenis_pajak', 2)->where('status','SUCCESS')
                            ->selectRaw('MONTH(bulan_bayar) as month, COUNT(*) as count')
                            ->groupBy('month')
                            ->orderBy('month')
                            ->get();
        $labels = [];
        $data = [];
        
        for ($i=1; $i <= 12; $i++) { 
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;
            foreach ($grafikRestoran as $gr) {
                if ($gr->month == $i) {
                    $count = $gr->count;
                    break;
                }
            }

            array_push($labels,$month);
            array_push($data,$count);
        }
        $datasets = [
            [
                'label' => 'grafikRestoran',
                'data' => $data
            ]
        ];



        return view ('admin.index',compact('hotelDiterima','restoranDiterima','hiburanDiterima','parkirDiterima','totalHotel','totalParkir','totalHiburan','totalRestoran','pajakRestoranBaru','pajakHiburanBaru','pajakParkirBaru','pajakHotelBaru','transaksiBaru','datasets','labels'));
    }
    public function dataPengguna(User $id)
    {

        return view ('admin.data-pengguna.index',compact('id'));

    }
    public function dataPenggunaJson()
    {
        $query = User::all()->where('id','!=','1');

        return DataTables::of($query)
                        ->addIndexColumn()
                        ->addColumn('password', function ($data){
                            return '<a href="'. route('admin.update-password',$data->id) .'" class="btn btn-secondary btn-xs">Ganti Password</a>';
                            // return '<button type="button" value="'. $data->id.'" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Ganti Password</button>';
                        })
                       
                        ->rawColumns(['password'])
                        ->make(true);
    }
    public function edit(Request $request,User $user)
    {
        
        return view ('admin.data-pengguna.edit',compact('user'));
    }
    public function updatePassword(Request $request,User $user)
    {
         $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required','string','min:8','confirmed']
        ]);

        $curentPasswordStatus = Hash::check($request->current_password,$user->password);
        if ($curentPasswordStatus) {

            $user->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success','Password Updated Successfully');
        }else{
            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }
    public function adminPassword()
    {
        return view('admin.update-password');
    }
    public function adminPasswordUpdate(Request $request,User $user)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required','string','min:8','confirmed']
        ]);

        $curentPasswordStatus = Hash::check($request->current_password,auth()->user()->password);
        if ($curentPasswordStatus) {
          
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success','Password Updated Successfully');
        }else{
            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }
}
