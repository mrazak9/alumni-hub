<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumnis')->onDelete('cascade');
            $table->string('student_id', 20); //nim atau NRP
            $table->string('degree_level', 10); // D1, D3, S1
            $table->string('program', 50);
            $table->string('major', 50)->nullable();
            $table->string('degree', 50);
            $table->year('graduation_year');
            $table->decimal('ipk', 3, 2)->nullable();
            $table->string('no_ijazah', 50)->nullable();
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
        Schema::dropIfExists('education_histories');
    }
}
