<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoices_id')->references('id')->on('invoices');
            $table->unsignedBigInteger('products_id');
            $table->string('brand', 20);
            $table->string('type', 20);
            $table->string('description', 60)->nullable();
            $table->decimal('quantity', 8, 2);
            $table->char('unit', 4);
            $table->decimal('price', 8, 2);
            $table->decimal('tax', 5, 2);
            $table->decimal('discount', 8, 2);
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
        Schema::dropIfExists('invoices_items');
    }
}
