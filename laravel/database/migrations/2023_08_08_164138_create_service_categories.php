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
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->longText('icon')->nullable();
            $table->string('name_th')->nullable();
            $table->string('name_en')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_publish')->default(1);
            $table->timestamps();
            $table->softDeletes( $column = 'deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_categories');
    }
};
