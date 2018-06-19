<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeTranslatableSliderImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'cms_slider_images_translations', function ( Blueprint $table )
        {
            $table->increments( 'id' );
            $table->integer( 'slider_image_id' )->unsigned();
            $table->string( 'locale' )->index();

            $table->string( 'url' )->nullable();
            $table->string( 'image' );
            $table->string( 'image_1300' );
            $table->string( 'image_800' );
            $table->string( 'image_500' );

            $table->unique( ['slider_image_id','locale'] );
            $table->foreign( 'slider_image_id' )->references( 'id' )->on( 'cms_slider_images' )->onDelete( 'cascade' );

        });

        Schema::table( 'cms_slider_images', function ( Blueprint $table )
        {
            $table->dropColumn( 'image' );
            $table->integer( 'order' )->default( 1 );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'cms_slider_images', function ( Blueprint $table )
        {
            $table->string( 'image' );
        });

        Schema::dropIfExists( 'cms_slider_images_translations' );
    }
}
