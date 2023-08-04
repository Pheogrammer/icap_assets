<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kind_id');
            $table->string('asset_name');
            $table->date('purchase_date');
            $table->string('status');
            $table->unsignedBigInteger('added_by');
            $table->timestamps();

            // Add foreign key constraint for the 'kind_id' column
            $table->foreign('kind_id')->references('id')->on('kinds')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('assets');
    }
};
