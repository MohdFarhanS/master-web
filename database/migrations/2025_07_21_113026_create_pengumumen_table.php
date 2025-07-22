<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumumen', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->string("judul")->nullable();
			$table->text("deskripsi")->nullable();
            $table->boolean("tampilkan")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('pengumumen', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengumumen');
    }
};
