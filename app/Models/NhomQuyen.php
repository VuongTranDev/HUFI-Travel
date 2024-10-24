<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomQuyen extends Model
{
    use HasFactory;
    protected $table = 'nhomquyen';
    public function user(){
        return $this->hasMany(User::class,'nhomquyen_id');
    }
}
