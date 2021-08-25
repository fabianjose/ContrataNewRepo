<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHighlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('highlights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp("highlighted_expiration")->required();
            
            $table->bigInteger('department')->unsigned()->required();
            $table->foreign('department')->references('id')->on('departments')->onDelete('cascade');
            
            $table->bigInteger('municipality')->unsigned()->required();
            $table->foreign('municipality')->references('id')->on('municipalities')->onDelete('cascade');
            
            $table->bigInteger('offer')->unsigned();
            $table->foreign('offer')->references('id')->on('offers')->onDelete('cascade');

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
        Schema::dropIfExists('highlights');
    }
}
