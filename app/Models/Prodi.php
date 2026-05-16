<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Table('prodi')]
class Prodi extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'fakultas_id',
        'nama_prodi',
        'nama_kaprodi',
        'photo_kaprodi'
    ];
    public function fakultas(){
        return $this->belongsTo(Fakultas::class);
    }
}