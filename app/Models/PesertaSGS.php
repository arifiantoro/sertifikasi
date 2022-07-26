<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaSGS extends Model
{
    use HasFactory;
    public $table = "pesertas";
    protected $connection = 'mysql';

    public $incrementing = false;
    public $fillable = array('id', 'name', 'jk', 'tempat_lahir', 'tgl_lahir', 'pendidikan', 'telp', 'email', 'foto', 'golongan_darah', 'alamat_ktp', 'alamat_domisili');

    public function lembaga()
    {
        return $this->hasOne(Lembaga::class, 'id_peserta');
    }
    public function form_daftar()
    {
        return $this->hasOne(Form_daftar::class, 'id_peserta');
    }
}
