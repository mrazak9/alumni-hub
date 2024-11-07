<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100); // Nama lengkap, panjang 100 sudah ideal
            $table->string('nik', 16)->unique()->nullable(); // NIK
            $table->enum('gender', ['laki-laki', 'perempuan', 'lainnya'])->nullable();
            $table->string('place_of_birth', 100)->nullable(); // Tempat lahir, panjang 100 sudah cukup
            $table->date('date_of_birth')->nullable(); // Menggunakan tipe date untuk tanggal lahir
            $table->string('nationality', 50)->nullable(); // Kewarganegaraan, panjang 50 lebih memadai
            $table->string('religion', 40)->nullable(); // Agama, panjang 40 sudah cukup
            $table->enum('marital_status', ['lajang', 'menikah', 'cerai', 'duda/janda'])->nullable();
            $table->string('profile_picture')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
}
