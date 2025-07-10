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
        Schema::create('profile_instansis', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->text("kata_pengantar")->nullable();
			$table->text("sejarah_singkat")->nullable();
			$table->text("visi_misi")->nullable();
			$table->text("tugas_fungsi")->nullable();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('profile_instansis', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_instansis');
    }
};
