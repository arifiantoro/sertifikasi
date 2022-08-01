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
        $dbpeserta = DB::table('form_daftars')
            ->rightjoin('pesertas', 'form_daftars.id_peserta', '=', 'pesertas.id')
            ->join('trainings', 'form_daftars.id_training', '=', 'trainings.id')
            ->leftJoin('sub_categori_trainings', 'sub_categori_trainings.id', '=', 'trainings.sub_category_id_training')
            ->rightjoin('dbsertifikasi.sertifikat as db2', 'form_daftars.id', '=', 'db2.peserta_id')
            ->select(
                ['form_daftars.id_peserta', 'pesertas.name as nama', 'db2.peserta_id', 'db2.tgl_pengesahan', 'db2.masa_berlaku', DB::raw('sub_categori_trainings.name as nama_sub')],
            )
            ->orderBy('masa_berlaku', 'desc')
            ->get();
        return view('/fourth', compact('dbpeserta'));
    }
}
