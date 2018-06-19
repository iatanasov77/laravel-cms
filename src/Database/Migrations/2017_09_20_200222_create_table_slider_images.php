<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSliderImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'cms_slider_images', function ( Blueprint $table ) {
            $table->increments('id');
            $table->string( 'image' );
            $table->timestamp( 'date_from' )->nullable();
            $table->timestamp( 'date_to' )->nullable();
            $table->integer( 'order' );
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
        Schema::dropIfExists('cms_slider_images');
    }
}
