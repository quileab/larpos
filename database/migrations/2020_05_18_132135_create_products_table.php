<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('barcode', 30)->nullable();
            $table->string('brand', 20); // marca
            $table->string('type', 20); // modelo
            $table->string('description', 60)->nullable();
            $table->foreignId('unit_id')->references('id')->on('units');
            $table->decimal('price', 8, 2);
            $table->decimal('tax', 5, 2);
            $table->decimal('profit1', 5, 2)->nullable();
            $table->decimal('profit2', 5, 2)->nullable();
            $table->decimal('salesprice1', 8, 2);
            $table->decimal('salesprice2', 8, 2)->nullable();
            $table->decimal('discount', 8, 2)->nullable();
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
        Schema::dropIfExists('products');
    }
}
