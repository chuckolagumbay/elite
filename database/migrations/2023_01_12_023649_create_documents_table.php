<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crew_id');
            $table->string('code');
            $table->string('name');
            $table->string('document_number');
            $table->dateTime('date_issued');
            $table->dateTime('date_expiry');
            $table->text('remarks');
            $table->timestamps();
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('crew_id')->references('id')->on('crews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function(Blueprint $table) {
            $table->dropForeign(['crew_id']);
        });

        Schema::dropIfExists('documents');
    }
}
