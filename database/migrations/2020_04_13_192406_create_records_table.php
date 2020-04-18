<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('control_no');
            $table->string('status');
            $table->string('status_color');
            $table->string('received_date');
            $table->string('received_time');
            $table->string('source');
            $table->integer('deadline');
            $table->integer('pages');
            $table->string('document_type');
            $table->string('department_region');
            $table->string('manner_of_receipt');
            $table->string('office_province');
            $table->string('description');
            $table->boolean('submission')->default(0);
            $table->mediumText('disapproved_remark')->nullable();
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
        Schema::dropIfExists('records');
    }
}
