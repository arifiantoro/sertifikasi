<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reminders extends Controller
{
    public function __construct()
    {
        $this->pesertas = new \App\Models\PesertaSGS();
    }

    public function index()
    {
        $dbpeserta = new \App\Models\PesertaSGS();
        $dbpeserta = DB::table('trainings')
            ->join('sub_categori_trainings', 'sub_categori_trainings.id', '=', 'trainings.sub_category_id_training')
            ->rightjoin('dbsertifikasi.sertifikat as db2', 'db2.training_id', '=', 'trainings.id')
            ->select(
                [
                    'db2.training_id', 'db2.tgl_pengesahan', 'db2.masa_berlaku', DB::raw('trainings.title as title'), DB::raw('sub_categori_trainings.name as name'),
                    'sub_categori_trainings.id as id_batch',
                    DB::raw('trainings.id as id'),

                ],
            )
            ->orderBy('masa_berlaku', 'desc')
            ->get();
        return view('/fourth', compact('dbpeserta'));
    }

    public function remind($id)
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
        // dd($dbpeserta);

        $training = DB::table('trainings')->where('id', '=', $id)->select('title')->first();
        return view('/fifth', compact('dbpeserta', 'training'));
    }
}
