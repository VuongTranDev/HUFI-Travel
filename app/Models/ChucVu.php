<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;
    protected $table = 'chucvu';

    public function phancongchucvu(){
        return $this->hasMany(DiemDuLich::class,'chucvu_id');
    }

}
