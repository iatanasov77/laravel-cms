<?php

Route::group(['prefix' => 'cms', 'namespace' => '\IA\Laravel\Modules\Cms\Http\Controllers'], function()
{
    Route::resource( 'static-pages', 'StaticPagesController', [ 'as' => 'admin.cms'] );
    
    Route::get( 'static-pages/translations/{id}/{locale}/', 'StaticPagesTranslationsController@translation' )
        ->name( 'admin.cms.static-pages.translations' );
    
    Route::resource( 'slider-images', 'SliderImagesController', [ 'as' => 'admin.cms'] );
    Route::get( 'slider-images/{id}/activate', 'SliderImagesController@activate' )
        ->name( 'admin.cms.slider-images.activate' );
    Route::get( 'slider-images/{id}/deactivate', 'SliderImagesController@deactivate' )
        ->name( 'admin.cms.slider-images.deactivate' );
    
    Route::get( 'slider-images/translations/{id}/{locale}/', 'SliderImagesTranslationsController@translation' )
        ->name( 'admin.cms.slider-images.translations' );
    Route::post( 'slider-images/order', 'SliderImagesController@order' )
        ->name( 'admin.cms.slider-images.order' );
    
    Route::resource( 'portlets', 'PortletsController', [ 'as' => 'admin.cms'] );
});
