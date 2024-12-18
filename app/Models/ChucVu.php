<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;
    protected $table = 'chucvu';
    protected $primaryKey = 'machucvu';
    public function phancongchucvu(){
        return $this->hasMany(PhanCongChucVu::class,'machucvu');
    }

}
