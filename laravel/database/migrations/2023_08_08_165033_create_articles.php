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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('thumb')->nullable();
            $table->string('img')->nullable();
            $table->string('title_th')->nullable();
            $table->string('title_en')->nullable();
            $table->text('caption_th')->nullable();
            $table->text('caption_en')->nullable();
            $table->longText('desc_th')->nullable();
            $table->longText('desc_en')->nullable();
            $table->date('post_date');
            $table->date('start_at');
            $table->date('end_at')->nullable();
            $table->string('slug_th')->nullable();
            $table->string('slug_en')->nullable();
            $table->boolean('is_highlight')->default(0)->index();
            $table->string('highlight_img')->nullable();
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
        Schema::dropIfExists('articles');
    }
};
