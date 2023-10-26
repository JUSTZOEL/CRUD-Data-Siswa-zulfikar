<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nis','nama','tmpt_lahir','tgl_lhr','no_hp','jns_klmn','alamat'];
    protected $table = 'siswa';
    public $timestamps = false;
}
