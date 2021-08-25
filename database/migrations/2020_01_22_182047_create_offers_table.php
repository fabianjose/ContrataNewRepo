<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company')->unsigned();
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
            $table->bigInteger('service')->unsigned();
            $table->foreign('service')->references('id')->on('services')->onDelete('cascade');

            $table->string('benefits',124);
            
            $table->bigInteger('tariff');

            $table->integer('points')->default(0);
            $table->enum('type',['private','company'])->nullable();

            $table->longText('departments')->nullable();

            $table->longText('municipalities')->nullable();

            $table->boolean('trash')->default(0);
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
        Schema::dropIfExists('offers');
    }
}
