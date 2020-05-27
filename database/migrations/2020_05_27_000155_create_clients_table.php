<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('idtype', 3);
            $table->string('fullname', 50)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('address', 40)->nullable();
            $table->tinyInteger('taxcond')->nullable();
            $table->string('phones', 30)->nullable();
            $table->string('group', 2)->nullable();
            $table->string('taxid', 11); // cuit
            $table->string('email', 127);
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
        Schema::dropIfExists('clients');
    }
}
