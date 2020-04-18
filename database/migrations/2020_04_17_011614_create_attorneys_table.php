<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttorneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attorneys', function (Blueprint $table) {
            $table->id();
            $table->integer('record_id')->unsigned();
            $table->foreign('record_id')->references('id')->on('records')->onDelete('set null');
            $table->string('attorney_id');
            $table->string('due_date');
            $table->softDeletes();
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
        Schema::dropIfExists('attorneys');
    }
}
