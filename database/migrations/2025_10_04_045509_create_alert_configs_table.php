<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_configs', function (Blueprint $table) {
            $table->id();
            $table->string('alert_type'); 
            $table->string('name');
            $table->string('company');
            $table->string('contact'); 
            $table->text('alert_msg')->nullable();
            $table->boolean('sent')->default(0);
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
        Schema::dropIfExists('alert_configs');
    }
};
