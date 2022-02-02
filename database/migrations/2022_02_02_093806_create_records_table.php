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
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('accountcategory_id');
            $table->string('record_received');
            $table->string('record_date');
            $table->string('record_amount');
            $table->string('record_receipt_no');
            $table->string('staff_id');
            $table->timestamps();

            $table->index('account_id');
            $table->index('accountcategory_id');
            $table->index('staff_id');
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
