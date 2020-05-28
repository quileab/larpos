<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTaxoperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxoperations', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->unique()->primary();
            $table->decimal('value', 5, 2);
            $table->string('description')->nullable();
            $table->timestamps();
        });

        DB::update("ALTER TABLE taxoperations AUTO_INCREMENT = 0;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxoperations');
    }
}
