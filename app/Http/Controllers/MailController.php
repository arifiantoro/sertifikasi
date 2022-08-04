<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\emailreminders;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class MailController extends Controller
{
    public function index($id)
    {

        $dbpeserta = new \App\Models\PesertaSGS();
        $dbpeserta = DB::table('trainings')
            ->join('sub_categori_trainings', 'sub_categori_trainings.id', '=', 'trainings.sub_category_id_training')
            ->join('form_daftars', 'trainings.id', '=', 'form_daftars.id_training')
            ->join('pesertas', 'form_daftars.id_peserta', '=', 'pesertas.id')
            ->rightjoin('dbsertifikasi.sertifikat as db2', 'db2.training_id', '=', 'trainings.id')
            ->select(
                [
                    'db2.training_id', 'db2.tgl_pengesahan', 'db2.masa_berlaku', DB::raw('trainings.title as title'), DB::raw('pesertas.name as name'),
                    'pesertas.telp',
                    'pesertas.email',
                    DB::raw('trainings.id as id'),
                ],
            )
            ->where('form_daftars.id_training', '=', $id)
            ->get();

        dd($dbpeserta);


        $details = [
            'title' => 'Pengingat dari sinarindoglobal.com',
            'body' => 'Masa berlaku sertifikat anda akan segera habis, mohon segera melakukan uji kompetensi ulang di sinarindoglobal.com'
        ];

        foreach ($dbpeserta as $email) {
            Mail::to($email)->send(new \App\Mail\emailreminder($details));
        }

        // dd("Email sudah terkirim.");
        return json_encode('200 OK');
    }
}
