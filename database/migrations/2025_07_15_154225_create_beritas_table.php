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
        Schema::create('beritas', function (Blueprint $table) {
            $table->uuid("id")->primary();
			$table->text("judul");
			$table->longText("deskripsi");
			$table->date("tanggal");
			$table->foreignUuid("user_id")->constrained();
			$table->timestamps();
			$table->softDeletes();
        });

        Schema::table('beritas', function (Blueprint $table) {
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
};
