<?php

namespace App\Http\Controllers;

use App\Models\PermintaanSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
class NotifController extends Controller
{
    public function send_by_venom(Request $request)
    {
        $req_data = $request->all();
        $number = $req_data["number"];
        $message = $req_data["message"];

        try{
            $response = Http::post('http://localhost:3000/send-message', [
                'number' => $number, // Nomor penerima
                'message' => $message
            ]);
            
            if ($response->successful()) {
                $data = $response->json(); // Ambil data JSON dari respon
                return redirect()->back()->with('success', $data);
            } else {
                // // Tangani kesalahan jika panggilan API tidak berhasil
                // echo 'Failed to send WhatsApp message: ' . $response->status();
                return redirect()->back()->with('error', $response->status());
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show_data()
    {
        $data = PermintaanSupport::all();
        return view('data_permintaan', ['data' => $data]);
    }

    public function cek_data()
    {
        $data = PermintaanSupport::all();
        $problemCount = 0;
        foreach($data as $d){
            $tgl_harus_selesai = Carbon::createFromFormat('Y-m-d', $d->tgl_harus_selesai);
            if($d->status !='selesai' && $tgl_harus_selesai->isPast())
            {
                $problemCount++;
            }
        }
        if($problemCount > 0){
            try{
                $response = Http::post('http://localhost:3000/send-message', [
                    'number' => '6285225958383', // Nomor penerima
                    'message' => 'PENTING! terdapat data permintaan Support yang overdue sejumlah = '. $problemCount
                ]);
                
                if ($response->successful()) {
                    $data = $response->json(); // Ambil data JSON dari respon
                    echo $data['message'];
                } else {
                    // // Tangani kesalahan jika panggilan API tidak berhasil
                    echo 'Failed to send WhatsApp message: ' . $response->status();
                }
            }catch(\Exception $e){
                echo 'Failed to send WhatsApp message EXP: ' . $e->getMessage();
            }
        }

    }
}
