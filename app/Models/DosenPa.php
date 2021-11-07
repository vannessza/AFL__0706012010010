<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPa extends Model
{
    use HasFactory;
    protected $primaryKey = 'nik';
    protected $keyType = 'string';
    protected $fillable = ['nik','nama_dosen','jabatan_struktural','bidang_keahlian','pendidikan_terakhir','email','tempat_lahir','tanggal_lahir','gender','alamat','telp','image'];

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class, 'dosenpa', 'nik');
    }

    public function scopeFilter($query, array $filters){
        if(isset($filters['search']) ? $filters['search']: false){
          return $query->where('nama_dosen','like','%'. $filters['search'].'%')
                      ->orWhere('jabatan_struktural','like','%'. $filters['search'].'%')
                      ->orWhere('pendidikan_terakhir','like','%'. $filters['search'].'%')
                      ->orWhere('bidang_keahlian','like','%'. $filters['search'].'%');
        } 
    }
}
