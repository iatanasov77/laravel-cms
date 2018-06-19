<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'cms_categories', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'parent_id' )->unsigned()->default( 0 );
            $table->string( 'slug' );

            $table->integer( 'position' )->default( 1 );
            $table->timestamps();

            $table->unique( 'slug' );
        });

        Schema::create( 'cms_categories_translations', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'category_id' )->unsigned();
            $table->string( 'locale' )->index();

            $table->string( 'name' );
            $table->text( 'description' )->nullable();

            $table->unique( ['category_id','locale'] );
            $table->foreign( 'category_id' )->references( 'id' )->on( 'cms_categories' )->onDelete( 'cascade' );

        });

        Schema::create( 'cms_static_pages', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'category_id' )->unsigned();
            $table->string( 'slug' );
            $table->string( 'image' )->nullable();
            $table->timestamps();

            $table  ->foreign( 'category_id' )->references( 'id' )->on( 'cms_categories' )
            ->onUpdate( 'cascade' )->onDelete( 'restrict' );
            $table->unique( 'slug' );
        });

        Schema::create( 'cms_static_pages_translations', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'static_page_id' )->unsigned();
            $table->string( 'locale' )->index();


            $table->string( 'title' )->nullable();
            $table->string( 'sub_title' )->nullable();
            $table->text( 'body' )->nullable();
            $table->text( 'tags' )->nullable();

            $table->unique( ['static_page_id','locale'] );
            $table->foreign( 'static_page_id' )->references( 'id' )->on( 'cms_static_pages' )->onDelete( 'cascade' );

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'cms_static_pages_translations' );
        Schema::dropIfExists( 'cms_static_pages' );
        Schema::dropIfExists( 'cms_categories' );
    }
}
