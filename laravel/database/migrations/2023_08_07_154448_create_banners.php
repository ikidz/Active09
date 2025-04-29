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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('img')->nullable();
            $table->string('title_th')->nullable();
            $table->string('title_en')->nullable();
            $table->text('caption_th')->nullable();
            $table->text('caption_en')->nullable();
            $table->integer('order')->default(0);
            $table->date('start')->nullable()->index();
            $table->date('end')->nullable();
            $table->boolean('is_publish')->default(1)->index();
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
        Schema::dropIfExists('banners');
    }
};
