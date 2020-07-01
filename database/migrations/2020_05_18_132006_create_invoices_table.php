<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->char('letter', 1);
            $table->unsignedInteger('serial');
            $table->unsignedInteger('number');
            $table->date('date');
            $table->char('salecondition', 1);
            $table->unsignedInteger('deliverynoteserial');
            $table->unsignedInteger('deliverynotenumber');
            $table->string('seller', 20);
            $table->decimal('discount', 8, 2);
            $table->string('client_ID', 11);
            $table->string('client_ID_type', 4);
            $table->unsignedInteger('client_ID_number');
            $table->string('client_Name', 50);
            $table->string('client_City', 30);
            $table->string('client_address', 30);
            $table->string('client_tax_Cond', 2);
            $table->string('client_phone', 30);
            $table->string('client_email', 50);
            $table->char('flag', 3);
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
        Schema::dropIfExists('invoices');
    }
}
