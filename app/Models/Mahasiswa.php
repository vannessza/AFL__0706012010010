<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['nim','nama','angkatan','jurusan','dosenpa','email','tempat_lahir','tanggal_lahir','gender','alamat','telp','image'];
    public function dosenPa(){
        return $this->belongsTo(DosenPa::class, 'dosenpa', 'nik');
    }

    public function scopeFilter($query, array $filters){
        if(isset($filters['search']) ? $filters['search']: false){
            return $query->where('nama','like','%'. $filters['search'].'%')
                      ->orWhere('angkatan','like','%'. $filters['search'].'%')
                      ->orWhere('jurusan','like','%'. $filters['search'].'%')
                      ->orWhere('nim','like','%'. $filters['search'].'%');
        } 
    }
}
