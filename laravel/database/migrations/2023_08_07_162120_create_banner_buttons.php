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
        Schema::create('banner_buttons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('banner_id')->default(0)->index();
            $table->string('label_th')->nullable();
            $table->string('label_en')->nullable();
            $table->string('url_th')->nullable();
            $table->string('url_en')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_publish')->default(1);
            $table->timestamps();
            $table->softDeletes( $column = 'deleted_at' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_buttons');
    }
};
