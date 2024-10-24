<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachSan extends Model
{
    use HasFactory;
    protected $table = 'khachsan';

    public function khachsantheochuongtrinh(){
        return $this->hasMany(KhachSanTheoChuongTrinh::class,'khachsan_id');
    }
}
