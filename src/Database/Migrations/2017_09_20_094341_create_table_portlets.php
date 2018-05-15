<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePortlets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'cms_portlets', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'slug' );
            $table->string( 'image' )->nullable();
            $table->timestamps();

            $table->unique( 'slug' );
        });

        Schema::create( 'cms_portlets_translations', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'portlet_id' )->unsigned();
            $table->string( 'locale' )->index();

            $table->string( 'title' );
            $table->text( 'description' );

            $table->unique( ['portlet_id', 'locale'] );
            $table->foreign( 'portlet_id' )->references( 'id' )->on( 'cms_portlets' )->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_portlets_translations');
        Schema::dropIfExists('cms_portlets');
    }
}
