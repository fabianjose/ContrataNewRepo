<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("service_id")->unsigned();
            $table->foreign("service_id")->references("id")->on("services")->onDelete('cascade');
            $table->string("name",32);
            $table->enum("type", ["numeric", "string"]);
            $table->string("unit",16)->nullable();

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
        Schema::dropIfExists('fields');
    }
}
