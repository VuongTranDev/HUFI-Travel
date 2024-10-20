<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phuongtientheochuongtrinh', function (Blueprint $table) {
            $table->integer('chuongtrinhtour_id')->unsigned();
            $table->integer('phuongtien_id')->unsigned();
            $table->integer('soluonghanhkhach')->unsigned();
            $table->string('ghichu') ;
            $table->primary(['chuongtrinhtour_id', 'phuongtien_id']);
            $table->foreign('chuongtrinhtour_id')->references('id')->on('chuongtrinhtour')->onDelete('cascade');
            $table->foreign('phuongtien_id')->references('id')->on('phuongtien')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phuongtientheochuongtrinh');
    }
};
