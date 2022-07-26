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
            ->rightjoin('dbsertifikasi.sertifikasi as db2', 'db2.training_id', '=', 'trainings.id')
            ->select(
                [
                    'db2.training_id', 'db2.tgl_pengesahan', 'db2.masa_berlaku', 'db2.permohonan', 'db2.pemberitahuan', DB::raw('trainings.title as title'), DB::raw('sub_categori_trainings.name as name'),
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
            ->rightjoin('dbsertifikasi.sertifikasi as db2', 'db2.training_id', '=', 'trainings.id')
            ->select(
                [
                    'db2.training_id', 'db2.tgl_pengesahan', 'db2.masa_berlaku', DB::raw('trainings.title as title'), DB::raw('pesertas.name as name'),
                    'pesertas.telp',
                    'pesertas.email',
                    DB::raw('trainings.id as id'),
                    DB::raw('pesertas.id as id_peserta'),
                ],
            )
            ->where('form_daftars.id_training', '=', $id)
            ->get();
        // dd($dbpeserta);

        $training = DB::table('trainings')->where('id', '=', $id)->select('title')->first();
        return view('/fifth', compact('dbpeserta', 'training'));
    }

    public function upload($id)
    {
        $dbpeserta = new \App\Models\PesertaSGS();
        $dbpeserta = DB::table('trainings')
            ->join('sub_categori_trainings', 'sub_categori_trainings.id', '=', 'trainings.sub_category_id_training')
            ->join('form_daftars', 'trainings.id', '=', 'form_daftars.id_training')
            ->join('pesertas', 'form_daftars.id_peserta', '=', 'pesertas.id')
            ->rightjoin('dbsertifikasi.sertifikasi as db2', 'db2.training_id', '=', 'trainings.id')
            ->select(
                [
                    DB::raw('pesertas.id as id_peserta'),
                    DB::raw('pesertas.name as name'),
                    'pesertas.telp',
                    'pesertas.email',
                    DB::raw('trainings.title as title'),
                ],
            )
            ->where('pesertas.id', $id)->first();

        // dd($dbpeserta);

        return view('/upload', compact('dbpeserta'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sertifikat' => ['required'],


        ]);
        $modelupload = new \App\Models\upload();
        
        $upload = $request->file('sertifikat');
        // dd($upload);
        if (is_dir(public_path('images'))) {
            $upload->move(public_path('images'), $upload->getClientOriginalName());
        } else {
            mkdir(public_path('images'));
            $upload->move(public_path('images'), $upload->getClientOriginalName());
        }

        if ($request->hasFile('sertifikatsgs')) {
            $uploadsgs = $request->file('sertifikatsgs');
        // dd($uploadsgs);
            if (is_dir(public_path('images'))) {
            $uploadsgs->move(public_path('images'), $uploadsgs->getClientOriginalName());
            } else {
            mkdir(public_path('images'));
            $uploadsgs->move(public_path('images'), $uploadsgs->getClientOriginalName());
          }
        } else{
            $uploadsgs = null;
        }
        
        if ($request->hasFile('skp')) {
            $uploadskp = $request->file('skp');
        // dd($uploadskp);
            if (is_dir(public_path('images'))) {
            $uploadskp->move(public_path('images'), $uploadskp->getClientOriginalName());
            } else {
            mkdir(public_path('images'));
            $uploadskp->move(public_path('images'), $uploadskp->getClientOriginalName());
          }
        } else{
            $uploadskp = null;
        }

        
    
        $upload = [
            'id_peserta' => $request->id ,
            'sertifikat' => $upload->getClientOriginalName(),
        ];

        if($uploadsgs <> null){
            $upload = array_merge($upload, array('sertifikatsgs' => $uploadsgs->getClientOriginalName()));
        }
        if($uploadskp <> null){
            $upload = array_merge($upload, array('sertifikatskp' => $uploadskp->getClientOriginalName()));
        }

        // dd($upload);

        if ($modelupload->insert($upload)) {
            // return redirect()
            //     ->to('/first');
            return redirect()->back();
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
