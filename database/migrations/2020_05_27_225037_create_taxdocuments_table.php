<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxdocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxdocuments', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->unique()->primary();
            $table->string('description')->nullable();
            $table->unsignedSmallInteger('order')->default(999)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxdocuments');
    }
}
