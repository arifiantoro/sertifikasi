<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikasi extends Model
{
    use HasFactory;
    public $table = "sertifikasi";
    protected $connection = 'mysql2';
    protected $fillable = ['training_id', 'masa_berlaku', 'tgl_pengesahan', 'sertifikat', 'permohonan', 'pemberitahuan'];
}
