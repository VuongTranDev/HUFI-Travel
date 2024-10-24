<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemDuLich extends Model
{
    use HasFactory;
    protected $table = 'diemdulich';
    public function chitiettour(){
        return $this->hasMany(ChiTietTour::class,'diemdulich_id');
    }
}
