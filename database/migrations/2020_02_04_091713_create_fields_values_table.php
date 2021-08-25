<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger("offer_id")->unsigned();
            $table->foreign("offer_id")->references("id")->on("offers")->onDelete('cascade');

            $table->bigInteger("field_id")->unsigned();
            $table->foreign("field_id")->references("id")->on("fields")->onDelete('cascade');

            $table->string("value");

            $table->boolean("trash")->default(0);

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
        Schema::dropIfExists('fields_values');
    }
}
