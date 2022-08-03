<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pesertas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->pesertas = new \App\Models\PesertaSGS();
    }

    public function index()
    {
        $dbpeserta = new \App\Models\PesertaSGS();
        $dbpeserta = DB::table('trainings')

            ->leftJoin('sub_categori_trainings', 'sub_categori_trainings.id', '=', 'trainings.sub_category_id_training')

            ->select(
                DB::raw('trainings.id as id_training'),
                'sub_categori_trainings.name',
                'trainings.title',
            )
            ->orderByRaw('trainings.created_at DESC')
            ->get();

        return view('/first', compact('dbpeserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cek()
    {
        $dbpeserta = new \App\Models\PesertaSGS();
        $dbpeserta = DB::table('form_daftars')
            ->join('pesertas', 'form_daftars.id_peserta', '=', 'pesertas.id')
            ->leftJoin('lembagas', 'pesertas.id', '=', 'lembagas.id_peserta')
            ->join('trainings', 'form_daftars.id_training', '=', 'trainings.id')
            ->join('jadwal_trainings', 'trainings.id', '=', 'jadwal_trainings.training_id')
            ->get();
        return view('/fifth', compact('dbpeserta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_pengesahan' => ['required'],
            'masa_berlaku' => ['required'],
        ]);
        $modelsertifikat = new \App\Models\Sertifikasi();

        $sertifikat = [
            'training_id' => $request->id,
            'tgl_pengesahan' =>  $request->tgl_pengesahan,
            'masa_berlaku' => $request->masa_berlaku,
        ];


        if ($modelsertifikat->create($sertifikat)) {
            return redirect()
                ->to('/first');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { {
            $dbpeserta = DB::table('trainings')
                ->rightjoin('sub_categori_trainings', 'sub_categori_trainings.id', '=', 'trainings.sub_category_id_training')
                ->select(
                    DB::raw('trainings.id as id_training'),
                    DB::raw('sub_categori_trainings.name as name'),
                    'sub_categori_trainings.name',
                    'trainings.title',

                )
                ->where('trainings.id', $id)->first();
            // dd($dbpeserta);


            return view('/third')->with(compact('dbpeserta'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
